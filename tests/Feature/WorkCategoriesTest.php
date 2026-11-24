<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Work;
use App\Models\WorkCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class WorkCategoriesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('secret'),
        ]));
    }

    private function work(?WorkCategory $category): Work
    {
        $work = new Work();
        $work->setTranslations('title', ['ar' => 'عمل', 'en' => 'Work']);
        $work->category_id = $category?->id;
        $work->save();

        return $work;
    }

    public function test_migrating_creates_the_three_existing_categories()
    {
        $this->assertSame(
            [['ar' => 'إنقاذ سفن', 'en' => 'Ship salvage'], ['ar' => 'لحام وقص', 'en' => 'Welding & cutting'], ['ar' => 'مسوحات', 'en' => 'Surveys']],
            WorkCategory::orderBy('id')->get()->map->getTranslations('name')->all(),
        );
    }

    public function test_admin_can_add_a_category()
    {
        $this->post(route('work_category_store'), ['titleAr' => 'تنظيف بواخر', 'titleEn' => 'Hull cleaning'])
            ->assertRedirect(route('work_category_list'));

        $category = WorkCategory::latest('id')->firstOrFail();
        $this->assertSame(['ar' => 'تنظيف بواخر', 'en' => 'Hull cleaning'], $category->getTranslations('name'));
        $this->assertSame(1, (int) $category->is_active);
    }

    public function test_both_names_are_required()
    {
        $count = WorkCategory::count();

        $this->post(route('work_category_store'), ['titleAr' => 'تنظيف بواخر', 'titleEn' => ''])
            ->assertSessionHasErrors('titleEn')
            ->assertSessionHas('error', 'يرجى إدخال اسم القسم بالإنجليزية');

        $this->assertSame($count, WorkCategory::count());
    }

    public function test_admin_can_rename_a_category()
    {
        $category = WorkCategory::firstOrFail();

        $this->post(route('work_category_update'), ['id' => $category->id, 'titleAr' => 'إنقاذ وانتشال', 'titleEn' => 'Salvage'])
            ->assertSessionHasNoErrors();

        $this->assertSame(['ar' => 'إنقاذ وانتشال', 'en' => 'Salvage'], $category->fresh()->getTranslations('name'));
    }

    public function test_admin_can_suspend_and_restore_a_category()
    {
        $category = WorkCategory::firstOrFail();

        $this->post(route('work_categories_toggle'), ['id' => $category->id]);
        $this->assertSame(-1, (int) $category->fresh()->is_active);

        $this->post(route('work_categories_toggle'), ['id' => $category->id]);
        $this->assertSame(1, (int) $category->fresh()->is_active);
    }

    public function test_deleting_a_category_keeps_its_works_without_a_category()
    {
        $category = WorkCategory::firstOrFail();
        $work = $this->work($category);

        $this->get(route('work_category_delete', $category->id))->assertSessionHasNoErrors();

        $this->assertNull(WorkCategory::find($category->id));
        $this->assertNull($work->fresh()->category_id);
    }

    public function test_the_list_shows_names_and_how_many_works_each_category_has()
    {
        $category = WorkCategory::firstOrFail();
        $this->work($category);
        $this->work($category);

        $this->get(route('work_category_list'))
            ->assertOk()
            ->assertSeeInOrder(['إنقاذ سفن', 'Ship salvage', '2'])
            ->assertSee('data-title_ar="إنقاذ سفن"', false);
    }

    public function test_the_dashboard_menu_links_to_the_categories()
    {
        $this->get(route('work_list'))->assertSee(route('work_category_list'), false);
    }

    public function test_guests_cannot_manage_categories()
    {
        auth()->logout();

        $this->get(route('work_category_list'))->assertRedirect();
        $this->post(route('work_category_store'), ['titleAr' => 'x', 'titleEn' => 'x'])->assertRedirect();
        $this->assertSame(3, WorkCategory::count());
    }
}

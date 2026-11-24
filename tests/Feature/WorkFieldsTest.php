<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Work;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class WorkFieldsTest extends TestCase
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

    private function payload(array $overrides = []): array
    {
        return array_merge([
            'titleAr' => 'إخراج الباخرة «مبارك ون»',
            'titleEn' => 'Refloating Mubarak One',
            'descriptionAr' => 'وصف',
            'descriptionEn' => 'Description',
            'imageUrl' => 'wo1.jpg',
            'category' => 'salvage',
            'clientAr' => 'شركة الربيع الأخضر',
            'clientEn' => 'Green Spring Company',
            'locationAr' => 'جزيرة سقطرى',
            'locationEn' => 'Socotra Island',
            'durationAr' => 'قرابة 3 سنوات',
            'durationEn' => 'About 3 years',
        ], $overrides);
    }

    public function test_admin_can_save_a_work_with_category_client_location_and_duration()
    {
        $this->post(route('work_store'), $this->payload())->assertRedirect(route('work_list'));

        $work = Work::firstOrFail();
        $this->assertSame('salvage', $work->category);
        $this->assertSame(['ar' => 'شركة الربيع الأخضر', 'en' => 'Green Spring Company'], $work->getTranslations('client'));
        $this->assertSame(['ar' => 'جزيرة سقطرى', 'en' => 'Socotra Island'], $work->getTranslations('location'));
        $this->assertSame(['ar' => 'قرابة 3 سنوات', 'en' => 'About 3 years'], $work->getTranslations('duration'));
    }

    public function test_admin_can_change_the_new_fields_when_updating_a_work()
    {
        $this->post(route('work_store'), $this->payload());
        $work = Work::firstOrFail();

        $this->post(route('work_update'), $this->payload([
            'id' => $work->id,
            'imageUrl' => '',
            'category' => 'survey',
            'locationAr' => 'بوصاصو · الصومال',
            'locationEn' => 'Bosaso · Somalia',
        ]));

        $work->refresh();
        $this->assertSame('survey', $work->category);
        $this->assertSame('بوصاصو · الصومال', $work->getTranslation('location', 'ar'));
    }

    public function test_the_new_fields_are_optional()
    {
        $this->post(route('work_store'), $this->payload([
            'category' => null, 'clientAr' => null, 'clientEn' => null,
            'locationAr' => null, 'locationEn' => null, 'durationAr' => null, 'durationEn' => null,
        ]))->assertSessionHasNoErrors();

        $this->assertNull(Work::firstOrFail()->category);
    }

    public function test_an_unknown_category_is_rejected()
    {
        $this->post(route('work_store'), $this->payload(['category' => 'painting']))
            ->assertSessionHasErrors('category');

        $this->assertSame(0, Work::count());
    }

    public function test_the_works_list_passes_the_new_fields_to_the_edit_form()
    {
        $this->post(route('work_store'), $this->payload());

        $this->get(route('work_list'))
            ->assertOk()
            ->assertSee('data-category="salvage"', false)
            ->assertSee('data-client_ar="شركة الربيع الأخضر"', false)
            ->assertSee('data-location_en="Socotra Island"', false)
            ->assertSee('data-duration_ar="قرابة 3 سنوات"', false);
    }
}

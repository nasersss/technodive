<?php

namespace Tests\Feature;

use App\Models\Certificate;
use App\Models\Customer;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;
use App\Models\WorkImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    private Work $work;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withHeader('Accept-Language', 'ar');

        $service = new Service();
        $service->setTranslations('title', ['ar' => 'اللحام تحت الماء', 'en' => 'Underwater welding']);
        $service->setTranslations('description', ['ar' => 'لحام معتمد', 'en' => 'Certified welding']);
        $service->image = 'se1.jpg';
        $service->save();

        $this->work = $this->makeWork('إخراج السفينة الجانحة «قلف دوف»', 'salvage');
        $this->makeWork('مسوحات بحرية لصالح أدمير إنرجي', 'survey');

        $equipment = new Equipment();
        $equipment->setTranslations('title', ['ar' => 'معدات الهيدروليك', 'en' => 'Hydraulic equipment']);
        $equipment->image = 'ex1.jpg';
        $equipment->save();

        $member = new Team();
        $member->setTranslations('name', ['ar' => 'سعيد صالح', 'en' => 'Saeed Saleh']);
        $member->setTranslations('job', ['ar' => 'غواص تجاري', 'en' => 'Commercial diver']);
        $member->save();

        $customer = new Customer();
        $customer->setTranslations('name', ['ar' => 'شركة هيدروبال', 'en' => 'Hydropal']);
        $customer->setTranslations('description', ['ar' => 'عمل ممتاز', 'en' => 'Excellent work']);
        $customer->save();

        $certificate = new Certificate();
        $certificate->setTranslations('title', ['ar' => 'الرخصة الدولية في الغوص التجاري', 'en' => 'International license']);
        $certificate->setTranslations('type', ['ar' => 'مؤهل', 'en' => 'Qualification']);
        $certificate->image = 'ex2.jpg';
        $certificate->save();
    }

    private function makeWork(string $title, ?string $category): Work
    {
        $work = new Work();
        $work->setTranslations('title', ['ar' => $title, 'en' => $title]);
        $work->setTranslations('description', ['ar' => 'وصف المشروع', 'en' => 'Project description']);
        $work->category = $category;
        $work->setTranslations('client', ['ar' => 'شركة العيسي', 'en' => 'Al-Essi Company']);
        $work->setTranslations('location', ['ar' => 'جزيرة سقطرى', 'en' => 'Socotra Island']);
        $work->setTranslations('duration', ['ar' => 'قرابة 6 أشهر', 'en' => 'About 6 months']);
        $work->save();

        $image = new WorkImage();
        $image->work_id = $work->id;
        $image->image = 'wo1.jpg';
        $image->save();

        return $work;
    }

    public function innerPages(): array
    {
        return [
            'about' => ['about'],
            'services' => ['services'],
            'works' => ['projects'],
            'equipment' => ['hardware'],
            'certificates' => ['ourExpertise'],
            'contact' => ['contact'],
        ];
    }

    /** @dataProvider innerPages */
    public function test_inner_page_uses_the_new_design(string $routeName)
    {
        $this->get(route($routeName))
            ->assertOk()
            ->assertSee('td-page-hero', false)
            ->assertDontSee('wow fadeIn', false);
    }

    public function test_project_page_uses_the_new_design()
    {
        $this->get(route('singleProjects', $this->work->id))
            ->assertOk()
            ->assertSee('td-page-hero', false)
            ->assertSee('إخراج السفينة الجانحة «قلف دوف»');
    }

    public function test_project_page_shows_client_location_service_type_and_duration()
    {
        $this->get(route('singleProjects', $this->work->id))
            ->assertSeeInOrder(['شركة العيسي', 'جزيرة سقطرى', 'إنقاذ سفن', 'قرابة 6 أشهر']);
    }

    public function test_project_page_lists_other_projects_but_not_itself()
    {
        $html = $this->get(route('singleProjects', $this->work->id))
            ->assertSee('مسوحات بحرية لصالح أدمير إنرجي')
            ->getContent();

        $this->assertSame(1, substr_count($html, 'data-work-category='));
        $this->assertStringNotContainsString('href="' . route('singleProjects', $this->work->id) . '" class="td-work__media-link"', $html);
    }

    public function test_project_page_returns_404_for_an_unknown_or_hidden_project()
    {
        $this->get(route('singleProjects', 9999))->assertNotFound();

        $this->work->is_active = -1;
        $this->work->save();
        $this->get(route('singleProjects', $this->work->id))->assertNotFound();
    }

    public function test_works_page_offers_category_filters_and_tags_each_card()
    {
        $this->get(route('projects'))
            ->assertSee('data-work-filter="salvage"', false)
            ->assertSee('data-work-filter="welding"', false)
            ->assertSee('data-work-filter="survey"', false)
            ->assertSee('data-work-category="salvage"', false)
            ->assertSee('data-work-category="survey"', false)
            ->assertSee('جزيرة سقطرى');
    }

    public function test_team_and_testimonial_pages_redirect_to_the_about_page()
    {
        $this->get(route('team'))->assertRedirect(route('about') . '#team');
        $this->get(route('testimonial'))->assertRedirect(route('about') . '#testimonials');
    }

    public function test_footer_lists_services_on_every_page()
    {
        $this->get(route('contact'))->assertSee('اللحام تحت الماء');
    }

    public function test_contact_heading_uses_the_new_wording()
    {
        $this->get(route('contact'))
            ->assertSee('تحدّث مع فريقنا')
            ->assertDontSee('يبدأ تحت السطح');
    }

    public function test_the_mobile_menu_is_rendered_outside_the_sticky_header()
    {
        // The header's backdrop-filter traps position:fixed children inside the
        // header box, which clipped the mobile menu to the header's height.
        $html = $this->get(route('index'))->getContent();

        $this->assertGreaterThan(strpos($html, '</header>'), strpos($html, 'id="td-drawer"'));
    }

    public function test_light_mode_is_the_default_whatever_the_device_prefers()
    {
        $this->get(route('index'))->assertDontSee('prefers-color-scheme: dark)\').matches', false);
    }
}

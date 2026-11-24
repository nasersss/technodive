<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('secret123'),
        ]);
    }

    public function test_login_page_carries_the_techno_dive_brand()
    {
        $this->get('/login')
            ->assertOk()
            ->assertSee('td-auth', false)
            ->assertSee(asset('/assets/img/logo.jpg'), false)
            ->assertSee('تكنو دايف')
            ->assertDontSee('logo-full.png', false);
    }

    public function test_login_page_has_no_link_to_the_missing_forgot_password_page()
    {
        $this->get('/login')->assertDontSee('page-forgot-password.html', false);
    }

    public function test_login_page_links_back_to_the_site()
    {
        $this->get('/login')->assertSee('href="' . route('index') . '"', false);
    }

    public function test_admin_can_log_in()
    {
        $this->post(route('login'), ['username' => 'admin', 'password' => 'secret123'])
            ->assertRedirect('/dashboard');

        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_wrong_password_shows_the_error_and_keeps_the_username()
    {
        $this->from('/login')
            ->post(route('login'), ['username' => 'admin', 'password' => 'wrong'])
            ->assertRedirect('/login');

        $this->get('/login')
            ->assertSee('اسم المستخدم او كلمة المرور غير صحيح')
            ->assertSee('value="admin"', false)
            ->assertSee('aria-invalid="true"', false);

        $this->assertGuest();
    }

    public function test_empty_password_shows_an_error_on_the_password_field()
    {
        $this->from('/login')->post(route('login'), ['username' => 'admin', 'password' => '']);

        $this->get('/login')
            ->assertSee('id="td-password-error"', false)
            ->assertSee('يرجى إدخال كلمة المرور');
    }

    public function test_change_password_page_uses_the_new_design_with_clear_labels()
    {
        $this->actingAs($this->admin)
            ->get(route('resetPassword'))
            ->assertOk()
            ->assertSee('td-auth', false)
            ->assertSee(asset('/assets/img/logo.jpg'), false)
            ->assertSee('كلمة المرور الجديدة')
            ->assertSee('حفظ التغييرات')
            ->assertDontSee('كلمة المرور السابقة')
            ->assertDontSee('logo-full.png', false);
    }

    public function test_changing_the_password_still_works_and_signs_out()
    {
        $this->actingAs($this->admin)
            ->post(route('resetPassword'), [
                'username' => 'admin',
                'newUsername' => 'diver',
                'password' => 'newpass1',
                'password_confirmation' => 'newpass1',
            ])
            ->assertRedirect(route('login'));

        $this->assertGuest();
        $this->assertSame('diver', $this->admin->fresh()->username);
        $this->assertTrue(Hash::check('newpass1', $this->admin->fresh()->password));
    }

    public function test_change_password_errors_show_on_the_form()
    {
        $this->actingAs($this->admin)
            ->from(route('resetPassword'))
            ->post(route('resetPassword'), [
                'username' => 'admin',
                'newUsername' => 'admin',
                'password' => 'newpass1',
                'password_confirmation' => 'different',
            ])
            ->assertRedirect(route('resetPassword'));

        $this->actingAs($this->admin)
            ->get(route('resetPassword'))
            ->assertSee('يجب ان تكون كلمة المرور متساوية مع اعادة كلمة المرور');
    }
}

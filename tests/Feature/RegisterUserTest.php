<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(CountrySeeder::class);
    }

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'username' => 'test',
            'email'    => 'test@gmail.com',
            'nationality' => 1,
            'country' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
            'deleted_at' => null,
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(route('verification.notice'));
    }

    public function test_displays_validation_errors_by_invalid_email()
    {
        $response = $this->post('/register', [
            'username' => 'test',
            'email'    => 'testgmail.com', // wrong
            'nationality' => 1,
            'country' => 1,
            'password' => 'password',
            'password_confirmation' => 'password',
            'deleted_at' => null,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }
}

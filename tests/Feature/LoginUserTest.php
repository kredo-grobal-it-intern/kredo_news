<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;
    public function test_login_user()
    {
        $this->seed(CountrySeeder::class);
        $country = Country::latest()->take(1)->first();
        
        $response = $this->post('/register', [
            'username' => 'mike',
            'email'    => 'mike@gmail.com',
            'nationality' => $country->id,
            'country' => $country->id,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->post('/login', [
            'email'    => 'mike@gmail.com',
            'password' => 'password',
        ]);
        $response->assertRedirect(route('news.index'));
    }

}

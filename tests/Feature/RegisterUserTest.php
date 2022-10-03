<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;
    public function test_create_user()
    {
        $this->seed(CountrySeeder::class);
        $country = Country::latest()->take(1)->first();

        // $country = Country::factory()->create();
        
        $response = $this->post('/register', [
            'username' => 'test',
            'email'    => 'test@gmail.com',
            'nationality' => $country->id,
            'country' => $country->id,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertRedirect(route('verification.notice'));
    }

   

}

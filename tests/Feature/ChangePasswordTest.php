<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_change_password(){
        $this->seed(UserSeeder::class);
        Session::start();
        $user = User::find(4);
        $response = $this->actingAs($user)->post('/changePassword', [
            'password' => 'new_password',
            'password_confirmation' => 'new_password',
            'current_password' => 'password',
            '_token' => csrf_token(),
        ]);
        $response->assertStatus(200);
    }
}

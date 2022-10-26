<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use RefreshDatabase;
    public function test_change_password(){
        $this->seed();
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

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    public function test_create_user()
    {
        $response = $this->post('/register', [
            'username' => 'test',
            'email'    => 'test111111111@gmail.com',
            'nationality' => '5',
            'country' => '5',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        dd($response);
        $response->from(route('register'))->assertRedirect(route('verification.notice'));
    }

    // public function test_create_user_fail()
    // {
       
    // }
}

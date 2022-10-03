<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;
    public function test_login_user()
    {
        $response = $this->post('/login', [
            'email'    => 'test@gmail.com',
            'password' => 'password',
        ]);
        $response->assertRedirect(route('news.index'));
    }

}

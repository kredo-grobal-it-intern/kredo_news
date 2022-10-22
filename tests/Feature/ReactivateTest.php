<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Carbon;

class ReactivateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function test_reactivate()
    {
        $user=User::factory()->create();
        $this->actingAs($user)->post(route('user.withdrawal'));
        $response=$this->get(route('reactivate',['user_id' => $user->id]));
        $response->assertRedirect(route('login'));
        $response->assertSessionHas([
                'reactivate' => 'Your account has been restored.'
        ]);
    }
}

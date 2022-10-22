<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Carbon;


class WithdrawalTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_withdrawal()
    {
        $user=User::factory()->create();
        $user->email_verified_at =Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        $response=$this->actingAs($user)->post(route('user.withdrawal'));
        $response->assertRedirect(route('news.index'));
    }
}

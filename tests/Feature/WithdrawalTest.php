<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\CountrySeeder;

class WithdrawalTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp() :void
    {
        parent::setUp();
        $this->seed(CountrySeeder::class);
        $this->user = User::factory()->create();
    }

    public function test_user_can_withdraw()
    {
        $response = $this->actingAs($this->user)->post(route('user.withdrawal'));
        $response->assertRedirect(route('news.index'));
    }
}

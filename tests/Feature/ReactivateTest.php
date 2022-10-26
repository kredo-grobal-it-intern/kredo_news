<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Database\Seeders\CountrySeeder;

class ReactivateTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp() :void
    {
        parent::setUp();
        $this->seed(CountrySeeder::class);
        $this->user = User::factory()->create();
    }

    public function test_user_can_reactivate_when_withdrawn()
    {
        $this->actingAs($this->user)->post(route('user.withdrawal'));
        $response = $this->get(route('reactivate', ['user_id' => $this->user->id]));
        $response->assertRedirect(route('login'));
        $response->assertSessionHas([
            'reactivate' => 'Your account has been restored.'
        ]);
    }
}

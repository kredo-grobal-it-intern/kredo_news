<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\RestoreMail;
use App\Models\User;
use Database\Seeders\CountrySeeder;

class RestoreMailTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(CountrySeeder::class);
        $this->user = User::factory()->create();
    }

    public function test_user_can_receive_email_for_restoration()
    {
        Mail::fake();
        Mail::to($this->user->email)->send(new RestoreMail($this->user));
        Mail::assertSent(RestoreMail::class);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\RestoreMail;
use App\Models\User;

class RestoreMailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_restoreMail()
    {
        Mail::fake();
        $user = User::factory()->create();
        Mail::to($user->email)->send(new RestoreMail($user));
        Mail::assertSent(RestoreMail::class);
    }
}

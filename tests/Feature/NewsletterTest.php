<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use App\Mail\Newsletter;

class NewsletterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_newsletter()
    {
        Mail::fake();
        $content="Test";
        $subject="Test";
        Mail::assertSent(new Newsletter($content, $subject));

    }
}

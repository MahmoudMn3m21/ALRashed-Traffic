<?php

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

beforeEach(function () {
    if (! extension_loaded('pdo_sqlite')) {
        $this->markTestSkipped('pdo_sqlite is not installed.');
    }
});

test('contact form stores the message and redirects quickly with a success flash', function () {
    Mail::fake();

    $this->from(route('contact.index'))
        ->post(route('contact.send'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '01000000000',
            'subject' => 'Hello',
            'message' => 'This is a test message.',
        ])
        ->assertRedirect(route('contact.index'))
        ->assertSessionHas('success');

    expect(Contact::query()->count())->toBe(1);
});

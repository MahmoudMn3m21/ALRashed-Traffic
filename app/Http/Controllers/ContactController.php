<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:30',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'],
            'message' => $validated['message'],
        ]);

        // Send mail after the browser already gets the redirect.
        // SMTP waits were making /contact/send take ~20s.
        dispatch(function () use ($validated) {
            try {
                $subjectLine = trim((string) ($validated['subject'] ?? ''));

                $body = "Name: {$validated['name']}\n"
                    . "Email: {$validated['email']}\n"
                    . "Phone: {$validated['phone']}\n"
                    . ($subjectLine !== '' ? "Subject: {$subjectLine}\n" : '')
                    . "\n"
                    . $validated['message'];

                Mail::raw($body, function ($mail) use ($validated, $subjectLine) {
                    $mail->to(config('mail.contact_to', 'info@alrashed-safety.com'))
                        ->subject(
                            'New Contact Message from '.$validated['name']
                            .($subjectLine !== '' ? ' — '.$subjectLine : '')
                        )
                        ->replyTo($validated['email'], $validated['name']);
                });
            } catch (Throwable $e) {
                Log::error('Contact form mail failed after the message was saved.', [
                    'email' => $validated['email'],
                    'error' => $e->getMessage(),
                ]);
            }
        })->afterResponse();

        return back(302, [], route('contact.index'))
            ->with('success', __('contact.form_success'));
    }
}

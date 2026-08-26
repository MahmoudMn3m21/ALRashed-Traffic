<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Validate inputs
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:30',
            'message' => 'required|string|max:2000',
        ]);

        // Save message to database
        Contact::create($request->only('name', 'email', 'phone', 'message'));

        // Send email to admin
        $body = "Name: {$request->name}\n"
            . "Email: {$request->email}\n"
            . "Phone: {$request->phone}\n\n"
            . $request->message;

        Mail::raw($body, function ($mail) use ($request) {
            $mail->to('mahmoudmn3m007@gmail.com')
                 ->subject('New Contact Message from ' . $request->name)
                 ->replyTo($request->email, $request->name)
                 ->from(config('mail.from.address'), config('mail.from.name'));
        });

        return back()->with('success', 'تم إرسال رسالتك بنجاح، سنقوم بالتواصل معك قريباً.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * Handle contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:500',
            'message' => 'required|string|max:5000',
        ]);

        try {
            // Send email notification (configure your mail settings in .env)
            // Uncomment the following lines when you have mail configured

            /*
            Mail::send('emails.contact', $validated, function ($message) use ($validated) {
                $message->to(config('app.contact_email'))
                    ->subject('New Contact Form Submission: ' . $validated['subject'])
                    ->replyTo($validated['email'], $validated['name']);
            });
            */

            // Log the contact form submission
            Log::info('Contact form submission', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => substr($validated['message'], 0, 100) . '...',
            ]);

            // TODO: Store in database if needed
            // You can create a Contact model and migration to store submissions
            // Contact::create($validated);

            return redirect()->route('contact')
                ->with('success', 'Thank you for your message! We\'ll get back to you soon.');

        } catch (\Exception $e) {
            Log::error('Contact form submission failed', [
                'error' => $e->getMessage(),
                'email' => $validated['email']
            ]);

            return redirect()->route('contact')
                ->with('error', 'Sorry, there was an error sending your message. Please try again later.')
                ->withInput();
        }
    }
}

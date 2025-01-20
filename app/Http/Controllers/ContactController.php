<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

/**
 * ContactController handles the contact form functionality.
 *
 * This controller manages the display and processing of the contact form,
 * including email sending and validation of user inputs.
 */
class ContactController extends Controller
{
    /**
     * Display the contact form.
     *
     * This method renders the contact form view to allow users
     * to send messages through the website.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Process and send the contact form message.
     *
     * This method validates the form input, constructs the email message,
     * and sends it to the specified email address. It includes error handling
     * and logging for failed email attempts.
     *
     * @param Request $request The HTTP request containing the form data
     * @return \Illuminate\Http\RedirectResponse Redirects back with a success or error message
     *
     * @throws \Illuminate\Validation\ValidationException When validation fails
     */
    public function send(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'name' => 'required|min:2',     // Name must be at least 2 characters
            'email' => 'required|email',     // Must be a valid email format
            'message' => 'required|min:10'   // Message must be at least 10 characters
        ]);

        try {
            // Construct email message with formatting
            $messageContent = "Nouveau message de contact\n\n";
            $messageContent .= "Nom: " . $validated['name'] . "\n";
            $messageContent .= "Email: " . $validated['email'] . "\n";
            $messageContent .= "Message:\n" . $validated['message'] . "\n";
            $messageContent .= "\nEnvoyé le: " . now() . "\n";

            // Send the email using Laravel's Mail facade
            Mail::raw($messageContent, function ($message) use ($validated) {
                $message->from(env('MAIL_FROM_ADDRESS'))
                       ->replyTo($validated['email'], $validated['name'])
                       ->to('vincdubois14@gmail.com')
                       ->subject('Message de contact - ' . $validated['name']);
            });

            // Return to previous page with success message
            return back()->with('message', 'Votre message a bien été envoyé !');

        } catch (\Exception $e) {
            // Log any errors that occur during email sending
            Log::error('Erreur d\'envoi d\'email: ' . $e->getMessage());

            // Return to previous page with error message and keep form inputs
            return back()->with('message', 'Erreur: ' . $e->getMessage())->withInput();
        }
    }
}

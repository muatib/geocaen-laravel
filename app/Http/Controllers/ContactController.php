<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        // Ici gérez l'envoi du mail comme vous le souhaitez
        // Par exemple avec Mail::to('votre@email.com')->send(new ContactMail($validated));

        return back()->with('message', 'Votre message a bien été envoyé !');
    }
}

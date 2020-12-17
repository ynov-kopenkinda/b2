<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('mails.contact.create');
    }
    public function store(Request $request)
    {
        $contact = new Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $contact->save();
        // Mail::to($request->input('email'))
        //     ->send(new \App\Mail\Contact([
        //         'firstname' => $request->input('name'),
        //         'email' => $request->get('email'),
        //         'message' => $request->input('message'),
        //     ]));
        Mail::send(
            'mails.contact.email',
            [
                'firstname' => $request->input('name'),
                'email' => $request->get('email'),
                'message' => $request->input('message'),
            ],
            function ($msg) use ($request) {
                $msg->from('me@me.com');
                $msg
                    ->to($request->input('email'), 'Doodoo')
                    ->subject('Pog');
            }
        );
        return view('mails.contact.create', ['success' => true]);
    }
}

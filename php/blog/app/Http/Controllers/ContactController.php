<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storage = Contact::all();
        return view('contacts/index', ['storage' => $storage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $comments = $request->input('comments', '');

        if (
            $firstname != '' &&
            $lastname != '' &&
            $phone != '' &&
            $email != ''
        ) {
            $contact = new Contact;
            $contact->firstname = $firstname;
            $contact->lastname = $lastname;
            $contact->phone = $phone;
            $contact->email = $email;
            $contact->comments = $comments;
            $contact->save();
            return view('contacts.index', [
                'success' => true,
                'message' => 'Nice job',
                'storage' => Contact::all(),
            ],);
        } else {
            return view('contacts.index', [
                'error' => true,
                'message' => "Please fill all the fields",
                'storage' => Contact::all(),
            ],);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return 'Update';
        return redirect()->route('contacts.index', [
            'error' => true,
            'message' => "Please fill all the fields",
            'storage' => Contact::all(),
        ],);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'Destroy';
    }
}

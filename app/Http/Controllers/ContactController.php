<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $request) {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->comment = $request->input('comment');
        $contact->save();

//        $validation = $request->validate([
//            'name' => 'required|min:5|max:55',
//            'comment' => 'required|min:5|max:55',
//        ]);

        return redirect()->route('home')->with('success', 'Успешно');
    }


    public function messages() {
        $contacts = Contact::all();
        return view('messages', ['contacts' => $contacts]);
    }

    public function message(int $id) {
        $contact = new Contact;
        $contacts = $contact::find($id);
        $rand_contacts = $contact->inRandomOrder()->get();

        $contacts = $contact->orderBy('id', 'desc')->take(1)->skip(1)->get();
        $contacts = $contact->orderBy('id', 'desc')->where('id', '=', $id)->get();

        return view('messages', ['contacts' => $contacts]);
    }
}

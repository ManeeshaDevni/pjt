<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function getContact()
    {
            return response()->json(Contact::all(), 200);
    }

    public function getContactById($id)
    {
       $contact = Contact::find($id);
       if(is_null($contact))
       {
           return response()->json(['message' => 'Contact not found'], 404);
       }
       return response()->json($contact::find($id), 200);
    }

    public function addContact(Request $request){
        $contact = Contact::create($request->all());
        return response($contact, 201);
    }

public function deleteContact(Request $request, $id)
{
    $contact = Contact::find($id);
    if(is_null($contact))
    {
        return response()->json(['message' => 'Contact not found'], 404);
    }
    $contact->delete();
    return response()->json(null, 204);
}
}

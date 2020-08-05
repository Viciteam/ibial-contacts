<?php

namespace App\Http\Controllers\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contacts;

class ContactsController extends Controller
{
    public function contacts($userid){
        $contacts = Contacts::where('user_id', $userid)->get();
        return response()->json(['status' => 'success','contacts' => $contacts], 200);
    }

    public function register(Request $request){
        $contacts = Contacts::create($request->all());
        return response()->json(['status' => 'success','contacts' => $contacts], 201);
    }

    public function contactsUpdate(Request $request, Contacts $contacts){
        $contacts->update($request->all());
        return response()->json(['status' => 'success','contacts' => $contacts], 200);
    }

    public function contactsDelete(Request $request, Contacts $contacts){
        $contacts->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

}

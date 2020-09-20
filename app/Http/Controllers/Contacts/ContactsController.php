<?php

namespace App\Http\Controllers\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contacts;
use Validator;

class ContactsController extends Controller
{
    public function allContacts(){
        return response()->json(Contacts::get(), 200);
    }

    public function contacts($userid){
        $contacts = Contacts::where('user_id', $userid)->get();
        if($contacts->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','contacts' => $contacts], 200);
    }

    public function register(Request $request){
        $rules = [
            'user_id' => 'required',
            'contact_name' => 'required',
            'contact_email'   => 'required',
            'mobile_phone' => 'required',
            'job_title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $contacts = Contacts::create($request->all());
        return response()->json(['status' => 'success','contacts' => $contacts], 201);
    }

    public function contactsUpdate(Request $request, $id){
        $contacts = Contacts::find($id);
        if(is_null($contacts)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $contacts->update($request->all());
        return response()->json(['status' => 'success','contacts' => $contacts], 200);
    }

    public function contactsDelete(Request $request, $id){
        $contacts = Contacts::find($id);
        if(is_null($contacts)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $contacts->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

}

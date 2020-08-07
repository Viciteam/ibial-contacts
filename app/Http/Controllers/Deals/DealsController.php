<?php

namespace App\Http\Controllers\Deals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deals;
use Validator;

class DealsController extends Controller
{
    public function deals(){
        return response()->json(Deals::get(), 200);
    }

    public function register(Request $request){
        $rules = [
            'stage_id' => 'required',
            'contact_id'   => 'required',
            'deal' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $deals = Deals::create($request->all());
        return response()->json(['status' => 'success','deal' => $deals], 201);
    }

    public function deleteDeal(Request $request, $id){
        $deals = Deals::find($id);
        if(is_null($deals)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $deals->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

}

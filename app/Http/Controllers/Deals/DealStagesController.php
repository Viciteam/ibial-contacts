<?php

namespace App\Http\Controllers\Deals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DealStages;
use Validator;

class DealStagesController extends Controller
{
    public function dealstages(){
        return response()->json(DealStages::get(), 200);
    }

    public function register(Request $request){
        $rules = [
            'user_id' => 'required',
            'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $stage = DealStages::create($request->all());
        return response()->json(['status' => 'success','dealstage' => $stage], 201);
    }

    public function userDeals($userid){
        $dealstage = DealStages::where('user_id', $userid)->get();
        $deals = DealStages::with('deals')->where('user_id', $userid)->get();

        if($dealstage->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','data' => $deals], 200);
    }

    public function deleteDealStage(Request $request, $id){
        $deals = DealStages::find($id);
        if(is_null($deals)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $deals->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function updateStage(Request $request, $id){
        $stage = DealStages::find($id);
        if(is_null($stage)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $stage->update($request->all());
        return response()->json(['status' => 'success','dealstage' => $stage], 200);
    }


}

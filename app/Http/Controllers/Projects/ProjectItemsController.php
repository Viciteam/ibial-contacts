<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectItems;
use Validator;

class ProjectItemsController extends Controller
{
    public function register(Request $request){
        $rules = [
            'project_id' => 'required',
            'project_stage_id' => 'required',
            'title' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $items = ProjectItems::create($request->all());
        return response()->json(['status' => 'success','items' => $items], 201);
    }

    public function deleteProjectItems(Request $request, $id){
        $items = ProjectItems::find($id);
        if(is_null($items)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $items->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function updateProjectItems(Request $request, $id){
        $items = ProjectItems::find($id);
        if(is_null($items)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $items->update($request->all());
        return response()->json(['status' => 'success','items' => $items], 200);
    }

}

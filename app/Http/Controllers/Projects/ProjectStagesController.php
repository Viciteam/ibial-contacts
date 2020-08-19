<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProjectStages;
use Validator;

class ProjectStagesController extends Controller
{
    public function register(Request $request){
        $rules = [
            'project_id' => 'required',
            'stage_name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $stage= ProjectStages::create($request->all());
        return response()->json(['status' => 'success','projects' => $stage], 201);
    }

    public function deleteProjectStage(Request $request, $id){
        $stage = ProjectStages::find($id);
        if(is_null($stage)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $stage->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function updateProjectStage(Request $request, $id){
        $stage = ProjectStages::find($id);
        if(is_null($stage)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $stage->update($request->all());
        return response()->json(['status' => 'success','Stage' => $stage], 200);
    }

}

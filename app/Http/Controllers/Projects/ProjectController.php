<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projects;
use Validator;

class ProjectController extends Controller
{
    public function projects(){
        return response()->json(Projects::get(), 200);
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
        $projects = Projects::create($request->all());
        return response()->json(['status' => 'success','projects' => $projects], 201);
    }

    public function userProjects($userid){
        $projects = Projects::where('user_id', $userid)->get();
        $userprojects = Projects::with('project_stages', 'project_stages.project_items')
                                 ->where('user_id', $userid)->get();

        if($projects->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','projects' => $userprojects], 200);

    }

    public function deleteProject(Request $request, $id){
        $projects = Projects::find($id);
        if(is_null($projects)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $projects->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function updateProject(Request $request, $id){
        $project = Projects::find($id);
        if(is_null($project)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $project->update($request->all());
        return response()->json(['status' => 'success','project' => $project], 200);
    }

}

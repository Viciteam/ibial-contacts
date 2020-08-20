<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PageBuilder;
use Validator;

class PageBuilderController extends Controller
{
    public function register(Request $request){
        $rules = [
            'user_id' => 'required',
            'page_title' => 'required',
            'page_link' => 'required',
            'page_content' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }
        $request->page_content = htmlentities(htmlspecialchars($request->page_content));
        $projects = PageBuilder::create($request->all());
        return response()->json(['status' => 'success','projects' => $projects], 201);
    }

    public function pagebuilders($userid){
        $page = PageBuilder::where('user_id', $userid)->get();
        
        if($page->count() === 0 ){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);
        }
        return response()->json(['status' => 'success','page' => $page], 200);
    }

    public function deletePage(Request $request, $id){
        $page = PageBuilder::find($id);
        if(is_null($page)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $page->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function updatePage(Request $request, $id){
        $page = PageBuilder::find($id);
        if(is_null($page)){
            return response()->json(['status' => 'error','message' => 'Record not found...'], 404);     
        }
        $page->update($request->all());
        return response()->json(['status' => 'success','Page' => $page], 200);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function add_tag(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'tag_name'=>'required|min:4',
            'ad_id'=>'required',
        ]);
        
        if($validation->fails())
        {
            return response($validation->errors());
        }

        $ad = Tag::create([
            'tag_name'=>$request->tag_name,
            'ad_id'=>$request->ad_id,
        ]);

        return response()->json(['success'=>true , 'data'=>$ad]);
    }

    public function show_tag($id)
    {
        $tag = Tag::find($id);

        if($tag == false)
        {
            return response('Tag Not Found');
        }

        return response()->json(['success'=>true , 'data'=>$tag]);
    }

    public function update_tag($id , Request $request)
    {
        $validation = Validator::make($request->all() , [
            'tag_name'=>'required|min:4',
        ]);

        if($validation->fails())
        {
            return response($validation->errors());
        }

        $tag = Tag::find($id);
        
        if($tag == false)
        {
            return response('Tag Not Found');
        }

        if($request->ad_id)
        {
            $tag->update(['ad_id'=>$request->ad_id]);
        }
        
        $tag->update(['tag_name'=>$request->tag_name]);
        return response()->json(['success'=>true , 'data'=>$tag]);
    }

    public function delete_tag($id)
    {
        $tag = Tag::find($id);
        
        if($tag == false)
        {
            return response('Tag Not Found');
        }
        
        $tag->delete();
        return response()->json(['success'=>true , 'data'=>$tag]);
    }
}

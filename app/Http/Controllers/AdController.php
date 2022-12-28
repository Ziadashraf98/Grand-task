<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdController extends Controller
{
    public function add_ad(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'type'=>'required|max:4',
            'title'=>'required|min:4',
            'description'=>'nullable',
            'start_date'=>'required|date',
            'category_id'=>'required',
        ]);
        
        if($validation->fails())
        {
            return response($validation->errors());
        }

        $ad = Ad::create([
            'type'=>$request->type,
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'advertiser_id'=>User::inRandomOrder()->first()->id,
            'category_id'=>$request->category_id,
        ]);

        return response()->json(['success'=>true , 'data'=>$ad]);
    }

    public function show_advertiser_ads($id)
    {
        $advertiser_ads = User::select('id','name')->with(['ad'=>function($q){
            $q->select('id','title','type','advertiser_id','category_id');
        }])->find($id);
        return response()->json(['success'=>true , 'data'=>$advertiser_ads]);
    }

    public function searchByCategory($id=null)
    {
        $categories = Ad::where('category_id', 'like' ,'%'. $id .'%')->get();

        return response()->json(['success'=>true , 'data'=>$categories]);
    }
}
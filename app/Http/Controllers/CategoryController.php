<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
        $validation = Validator::make($request->all() , [
            'category_name'=>'required|min:4|unique:categories',
        ]);
        
        if($validation->fails())
        {
            return response($validation->errors());
        }
        
        $category =  Category::create(['category_name'=>$request->category_name]);
        return response()->json(['success'=>true , 'data'=>$category]);
    }

    public function show_category($id)
    {
        $category = Category::find($id);

        if($category == false)
        {
            return response('Category Not Found');
        }

        return response()->json(['success'=>true , 'data'=>$category]);
    }

    public function update_category($id , Request $request)
    {
        $validation = Validator::make($request->all() , [
            'category_name'=>'required|min:4|unique:categories',
        ]);

        if($validation->fails())
        {
            return response($validation->errors());
        }

        $category = Category::find($id);
        
        if($category == false)
        {
            return response('Category Not Found');
        }
        
        $category->update(['category_name'=>$request->category_name]);
        return response()->json(['success'=>true , 'data'=>$category]);
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        
        if($category == false)
        {
            return response('Category Not Found');
        }
        
        $category->delete();
        return response()->json(['success'=>true , 'data'=>$category]);
    }
}
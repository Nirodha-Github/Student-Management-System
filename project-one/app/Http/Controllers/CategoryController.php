<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
     
        if($categories){
            return view('categories')->with('categories',$categories);
        }
        else{     
            return view('categories');
        }
        
    }

    public function store(StoreCategoryRequest $request)
    {
        $validator = Validator::make($request->all(),$request->rules());

        if($validator->fails()){
          
            return redirect('categories')->withErrors($validator);
        }
        else{
            
            Category::create($request->all());
            $categories = Category::all();
            Session::flash('success','Category added successfully.');
            return redirect('categories')->with('categories',$categories);
        }
    }

    
}

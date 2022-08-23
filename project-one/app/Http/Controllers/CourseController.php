<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if($categories){
            return view('courses')->with('categories',$categories);
        }
        else{
            $message  = 'No Category Data';
            return view('courses')->with('message',$message);
        }
   
        
    }

    public function store(StoreCourseRequest $request)
    {
        $validator = Validator::make($request->all(),$request->rules());

        if($validator->fails()){

            $categories = Category::all();
            
            return redirect('courses')->withErrors($validator)->with('categories',$categories);
        }
        else{            
            Course::create($request->all());
            $categories = Category::all();
            Session::flash('success','Course added successfully.');
         
            return redirect('courses')->with('categories',$categories);
        }
    }
    
}

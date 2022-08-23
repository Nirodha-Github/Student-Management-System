<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\Student;


class StudentController extends Controller
{
    public function index()
    {
        $courses = Course::select('id','name')->get();

        if($courses){
            return view('students')->with('courses',$courses);
        }
        else{
            $message  = 'No Student Data';
            return view('students')->with('message',$message);
        }   
    }

    public function store(StoreStudentRequest $request)
    {
        $validator = Validator::make($request->all(),$request->rules());
        
        if($validator->fails()){        
            $courses = Course::all();

            return redirect('students')->withErrors($validator)->with('courses',$courses);
        }
        else{  
            Student::create($request->all());
            $courses = Course::all();
            Session::flash('success','Student added successfully.');
          
            return redirect('students')->with('courses',$courses);
        }

    }
    
}

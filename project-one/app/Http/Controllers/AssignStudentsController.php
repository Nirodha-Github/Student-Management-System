<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreAssignStudentsRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Student;
use App\Models\Course;
use App\Models\Course_Student;
use App\Models\Category;

class AssignStudentsController extends Controller
{
    public function index()
    {
        $students = Student::select('id','name')->get();
        $categories = Category::select('id','name')->get();
     
        if($categories || $students ){
            return view('assign-students')->with('students',$students)
                                    ->with('categories',$categories);
        }
        else{
            $message  = 'No Student Data';
            return view('assign-students')->with('message',$message);
        }   
        
    }

    public function fetch($category_id = null)
    {
        $courses = Course::where('category_id',$category_id)->get();

        return response()->json([
            'status' =>1,
            'courses' => $courses
        ]);
    }   

    public function store(StoreAssignStudentsRequest $request)
    {
        $validator = Validator::make($request->only('course_id','student_id'),$request->rules());

        if($validator->fails()){
     
            return redirect('assign-students')->withErrors($validator);
        }
        else{
            
            Course_Student::create($request->only('course_id','student_id'));
            Session::flash('success','Students assigned successfully.');

            return redirect('assign-students');
        }
    }
   
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\AssignStudentsController;

class StoreAssignStudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_id'=>'required',
            'course_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Please select student',
            'course_id.required' => 'Please select course',
        ];
    }
}

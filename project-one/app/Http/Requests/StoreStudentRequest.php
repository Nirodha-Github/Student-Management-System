<?php

namespace App\Http\Requests;

use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name'=>['required','max:191','string'],
            'phoneNo'=>['required','size:10']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'name.max' => 'The name should have no more than:max characters',
            'name.string' => 'The name should be included characters',
            'phoneNo.required' => 'Please Enter phoneNo',
            'phoneNo.size' => 'The phone number should have no more than or less :size characters',
        ];
    }
}

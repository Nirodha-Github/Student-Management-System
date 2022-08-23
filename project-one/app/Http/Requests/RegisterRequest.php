<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//use App\Http\Controllers\AuthController;              

class RegisterRequest extends FormRequest
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
            'name'=>'required|max:191|string',
            'email'=>'required|email|max:191|unique:email',
            'password'=>'required|min:8',
            'confirmpassword'=>'required|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'name.max' => 'The name should have no more than:max characters',
            'name.string' => 'The name should be included characters',
            'email.required' => 'Please enter email',
            'email.max' => 'The email should have no more than:max characters',
            'email.unique' => 'The email should be unique',
            'password.required' => 'Please enter password',
            'password.min' => 'The password should have no less than:min characters',
            'confirmpassword.required' => 'Please enter password',
            'confirmpassword.min' => 'The password should have no less than:min characters',
            'confirmpassword.confirmed' => 'Confirm password should be same',
        ];
    }
}

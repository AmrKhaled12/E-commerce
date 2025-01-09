<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'             => 'required',                        
            'email'            => 'required|email|unique:users',     
            'password'         => ['required',
                                    'min:6',
                                    // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                                    'confirmed'],
            'password_confirm' => 'required|same:password'    
        ];
    }

    public function messages()
    {
        return[
            'name.required'=> 'please enter your name',
            'email.required'=> 'please enter your email',
            'password'=> 'your password is weak',
        ];
    }
}

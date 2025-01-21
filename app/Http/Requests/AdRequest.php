<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'AdName'=>'string|required|max:100',
            'address'=>'required|string|max:255',
            'chaild'=>'required',
            'description' => 'required|string|min:10|max:1000',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function messages()
    {
        return[
            'price.required' => 'The price field is required.',
            'AdName.required' => 'The Ad title field is required.',
            'address.required' => 'The address field is required.',
            'description.required' => 'The description field is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price cannot be negative.',
            'price.regex' => 'The price must have no more than two decimal places.',
        ];
    }
}

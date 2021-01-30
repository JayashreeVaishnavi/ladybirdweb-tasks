<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrokenEggRequest extends FormRequest
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
            'eggs_count' => 'required|numeric',
            'floors_count' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'eggs_count.required' => 'Please enter a valid number of eggs',
            'floors_count.required' => 'Please enter a valid number of floors',
            'eggs_count.numeric' => 'Please enter a valid number of eggs',
            'floors_count.numeric' => 'Please enter a valid number of floors',
        ];
    }
}

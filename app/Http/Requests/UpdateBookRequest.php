<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'value' => [
                'required',
                'numeric',
                'min:0.01',
                'max:99999.99',
                'regex:/^\d+(\.\d{1,2})?$/'
            ],
        ];
    }
}

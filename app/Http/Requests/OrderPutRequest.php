<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderPutRequest extends FormRequest
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
            'id' => ['exists:orders,id'],
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'phone' => ['required', 'regex:/^\+?\d \(\d{3}\) \d{3}\-\d{4}$/i'],
            'email' => ['required', 'email'],
            'description' => ['required', 'string', 'min:3'],
        ];
    }
}

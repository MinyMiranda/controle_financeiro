<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HandlingMoneyRequest extends FormRequest
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
            'value' => ['required', 'numeric', 'min:1.00', 'max:9999999999.99'],
            'cpf' => ['required','string','exists:users'],
        ];
    }
}

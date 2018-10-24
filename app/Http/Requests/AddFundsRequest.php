<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFundsRequest extends FormRequest
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
            //
            'number' => 'min:3|required',
            'amount' => 'required',
            'firstName' => 'min:3|required',
            'lastName' => 'min:3|required',
            'cvv' => 'required|max:3|min:3',
            'expiryYear' => 'required',
            'expiryMonth' => 'required',
        ];
    }
}

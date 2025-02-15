<?php

namespace App\Http\Requests\BusinessUser;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Store extends FormRequest
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
            
            'username'   => 'required|',
            'email' => 'required|unique:users,email',
            'password' => 'required|max:8',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['Status' => false,'ErrorCode' => 400, 'Errors' => $validator->errors()->all()],422));
    }
}

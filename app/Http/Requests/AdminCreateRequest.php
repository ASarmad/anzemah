<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 400));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8',
            'comfirmpassword' => 'required|same:password',
        ];
        return $rules;
    }

    public function attributes()
    {
        $attributes = [
            'email' => 'Email',
            'name' => 'Full Name',
            'password' => 'Password',
            'comfirmpassword' => 'Comfirm Password',
        ];
        return $attributes;
    }
}

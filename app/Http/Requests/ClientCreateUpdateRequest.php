<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientCreateUpdateRequest extends FormRequest
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

    public function onCreate()
    {
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8',
            'comfirmpassword' => 'required|same:password',
            'address'=>'required',
            'phone'=>'required|integer',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:6144', // 6144 KB = 6 MB
        ];
        return $rules;
    }
    
    public function onUpdate()
    {
        $rules = [
            'name' => 'required',
            'address'=>'required',
            'phone'=>'required|integer',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:6144', // 6144 KB = 6 MB
        ];
        return $rules;
    }

    public function rules()
    {
        return $this->isMethod('put') ? $this->onUpdate() : $this->onCreate();
    }

    public function attributes()
    {
        $attributes = [
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'comfirmpassword' => 'Comfirm Password',
            'address'=>'Address',
            'phone'=>'Phone Number',
            'logo' => 'Logo',
        ];
        return $attributes;
    }
}


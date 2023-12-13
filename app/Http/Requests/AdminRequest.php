<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdminRequest extends FormRequest
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
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 400));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    // public function onCreate()
    // {

    //     $rules['course_name'] = ['required', 'string'];
    //     $rules['type_id'] = ['required', 'not_in:0'];
    //     $rules['link_title'] = ['array', 'min:1'];
    //     $rules['link_title.*'] = ['string', 'distinct', 'max:255'];

    //     $rules['link'] = ['required', 'array', 'min:1'];
    //     $rules['link.*'] = ['required', 'string', 'distinct'];

    //     $rules['user_id'] = ['required', 'array', 'min:1'];

    //     return $rules;

    // }

    // public function onUpdate()
    // {
    //     $rules['course_name'] = ['required', 'string'];
    //     $rules['type_id'] = ['required', 'not_in:0'];
    //     $rules['link_title'] = ['array', 'min:1'];
    //     $rules['link_title.*'] = ['string', 'distinct', 'max:255'];

    //     $rules['link'] = ['required', 'array', 'min:1'];
    //     $rules['link.*'] = ['required', 'string', 'distinct'];

    //     $rules['user_id'] = ['required', 'array', 'min:1'];

    //     return $rules;
    // }

    public function rules()
    {
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8',
            'comfirmpassword' => 'required|same:password',
        ];
        // return $this->isMethod('put') ? $this->onUpdate() : $this->onCreate();
        return $rules;
    }

    // public function messages()
    // {
    //     $messages = [];
    //     if ($this->isMethod('post')) {
    //         foreach ($this->get('link') as $key => $value) {

    //             $messages['link.required'] = 'link number ' . $key + 1 . 'is required';

    //         }
    //     }
    //     return $messages;
    // }

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

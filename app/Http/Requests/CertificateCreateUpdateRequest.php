<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CertificateCreateUpdateRequest extends FormRequest
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
            'year' => 'required|integer',
            'status' => 'required|in:Valid,Expired,Pending',
            'type' => 'required|in:PCI-DSS',
            'version' => 'required',
        ];
        if ($this->input('status') === 'Valid' OR $this->input('status') === 'Expired') {
            $rules = array_merge($rules, [
                'ref_number' => 'required',
                'lastdate' => 'required|date',
                'targetdate' => 'required|date',
                'certificate_pdf'=>'required|file|mimes:pdf|max:6144',
            ]);
        }
        return $rules;
    }
    
    public function onUpdate()
    {
        $rules = [
            'year' => 'required|integer',
            'status' => 'required|in:Valid,Expired,Pending',
            'type' => 'required|in:PCI-DSS',
            'version' => 'required',
        ];
        if ($this->input('status') === 'Valid' OR $this->input('status') === 'Expired') {
            $rules = array_merge($rules, [
                'ref_number' => 'required',
                'lastdate' => 'required|date',
                'targetdate' => 'required|date',
                'certificate_pdf'=>'required|file|mimes:pdf|max:6144',
            ]);
        }
        return $rules;
    }

    public function rules()
    {
        return $this->isMethod('put') ? $this->onUpdate() : $this->onCreate();
    }

    public function attributes()
    {
        $attributes = [
            'year' => 'Year',
            'status' => 'Status',
            'type' => 'Type',
            'version' => 'Version',
            'ref_number' => 'Refrence Number',
            'lastdate' => 'Last Date',
            'targetdate' => 'Target Date',
            'certificate_pdf'=>'Certificate PDF',

        ];
        return $attributes;
    }
}

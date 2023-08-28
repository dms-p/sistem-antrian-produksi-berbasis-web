<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
{
    public $getMessages;
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
            'invoice'=>'required|max:14',
            'customer_id'=>'required',
            'sale_id'=>'required',
            'service_id'=>'required',
            'qty'=>'required|integer',
            'note'=>'nullable',
            'statusOrder'=>'required',
            'statusProcess'=>'required',
            'date_inv'=>'required'
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->getMessages=$validator;
    }
}

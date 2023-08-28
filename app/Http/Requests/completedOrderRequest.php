<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class completedOrderRequest extends FormRequest
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
            'order_id'=>'required',
            "printed_at"=>"required",
            "finished_at"=>"required",
            "failed_print"=>"required|integer",
            "surplus"=>"integer",
            "take_stock"=>"required|integer",
            "faulty_couse"=>"required",
            "bundle_id"=>"required"
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->getMessages=$validator;
    }
}

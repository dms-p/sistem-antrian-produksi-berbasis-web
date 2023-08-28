<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class materialOutRequest extends FormRequest
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
            'material_id'=>'integer|required',
            "qty"=>'integer|required',
            "date"=>"required",
            "note"=>"required"
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->getMessages=$validator;
    }
}

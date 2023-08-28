<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adsRequest extends FormRequest
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
            'name'=>'required|min:3|max:100',
            'image'=>'required|image|mimes:png,jpg,JPG,PNG,JPEG,jpeg|dimensions:max_width=1016,max_height=472,min_width=1016,min_height=472'
        ];
    }
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->getMessages=$validator;
    }
}

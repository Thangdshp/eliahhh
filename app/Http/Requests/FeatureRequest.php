<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
        switch ($this->method()) {
            //    Hander Post 
                case 'POST':
                    return [
                        'name'=>'required|unique:Feature,name'
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'name'=>'required|unique:Feature,name,'.$this->id
                    ];
                break;
           }
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        switch ($this->method()) {
            //    Hander Post 
                case 'POST':
                    return [
                        'name.required'=>'The feature not empty!',
                        'name.unique'=>'The feature must unique!'
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'name.required'=>'The feature not empty!',
                        'name.unique'=>'The feature must unique!'
                    ];
                break;
           }
    }
}

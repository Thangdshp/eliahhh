<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgProRequest extends FormRequest
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
                    'name'=>'required|unique:Category,name'
                ];
            break;
        //    Hander Get 
            case 'PUT':
                return [
                    'image'=>'mimes:jpeg,jpg,png,gif|max:10000'
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
                        'name.required'=>'The category not empty!',
                        'name.unique'=>'The category must unique!'
                    ];
                break;
            //    Hander Get 
                case 'PUT':
                    return [
                        'image.mimes'=>'The images not formed!',
                        'image.max'=>'The images max size 10mb!'
                    ];
                break;
           }
    }
}

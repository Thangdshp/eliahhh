<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                        'title'=>'required|unique:service,title',
                        'content'=>'required',
                        'checkList.*'=>'required',
                        'img1'=>'required|image|mimes:jpeg,jpg,png,gif',
                        'img2'=>'required|image|mimes:jpeg,jpg,png,gif'
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'title'=>'required|unique:service,title,'.$this->id,
                        'content'=>'required',
                        'checkList'=>'required',
                        'position'=>'required',
                        'img1'=>'nullable|image|mimes:jpeg,jpg,png,gif',
                        'img2'=>'nullable|image|mimes:jpeg,jpg,png,gif'
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
                        'title.required'=>'The title price not empty!',
                        'title.unique'=>'The unique must a unique!',
                        'content.required'=>'The title price not empty!',
                        'checkList.*.required'=>'The title price not empty!'
                        
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'title.required'=>'The title price not empty!',
                        'title.unique'=>'The unique must a unique!',
                        'content.required'=>'The title price not empty!',
                        'checkList.*.required'=>'The title price not empty!',
                        'position.required'=>'The position price not empty!'
                    ];
                break;
           }
    }
}

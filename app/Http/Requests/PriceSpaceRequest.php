<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\PriceSpaceRule;

class PriceSpaceRequest extends FormRequest
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
                        'start_price'=>'required|integer|min:0',
                        'end_price'=>[
                            'required',
                            'integer',
                            'min:0',
                            new PriceSpaceRule()
                        ]
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'start_price'=>'required',
                        'end_price'=>'required'
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
                        'start_price.required'=>'The start price not empty!',
                        'end_price.required'=>'The end price not empty!',
                        'start_price.integer'=>'The start price must interger!',
                        'end_price.integer'=>'The end price must interger',
                        'end_price.min'=>'The number must be positive',
                        'start_price.min'=>'The number must be positive'
                        
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'start_price.required'=>'The start price not empty!',
                        'end_price.required'=>'The end price not empty!'
                    ];
                break;
           }
    }
}

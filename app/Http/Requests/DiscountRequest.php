<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\checkDate;

class DiscountRequest extends FormRequest
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
                    'code_sale'=>'required|unique:discount_code,code_sale',
                    'dateStart'=>'required|date',
                    'ceilingPrice'=>'required|min:1|integer',
                    'priceStart'=>'required|min:1|integer',
                    'quantity'=>'required|min:1|integer',
                    'ratio'=>'required|integer|min:1',
                    'dateEnd'=>[
                        'required',
                        'date',
                        new checkDate()               
                    ]
                ];
            break;
        //    Hander Get 
            case 'PUT':
                return [
                    'code_sale'=>'required|unique:discount_code,code_sale,'.$this->id,
                    'dateStart'=>'required|date',
                    'ceilingPrice'=>'required|min:1|integer',
                    'priceStart'=>'required|min:1|integer',
                    'quantity'=>'required|min:1|integer',
                    'dateEnd'=>[
                        'required',
                        'date',
                        new checkDate()                      
                    ]
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
                        'code_sale.required'=>'The discount not empty!',
                        'code_sale.unique'=>'The discount must unique!',
                        'dateStart.required'=>'The dateStart not empty!',
                        'dateEnd.required'=>'The dateEnd not empty!',
                        'quantity.required'=>'The quantity not empty!',
                        'quantity.min'=>'The quantity must have value min=0!',
                        'quantity.integer'=>'The quantity must type integer!'
                    ];
                break;
            //    Hander Get 
                case 'PUT':
                    return [
                        'code_sale.required'=>'The discount not empty!',
                        'code_sale.unique'=>'The discount must unique!',
                        'dateStart.required'=>'The dateStart not empty!',
                        'dateEnd.required'=>'The dateEnd not empty!',
                        'quantity.required'=>'The quantity not empty!',
                        'quantity.min'=>'The quantity must have value min=0!',
                        'quantity.integer'=>'The quantity must type integer!'
                    ];
                break;
           }
    }
}

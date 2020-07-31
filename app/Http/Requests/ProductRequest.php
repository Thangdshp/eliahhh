<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\colorProductRule;

class ProductRequest extends FormRequest
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
                        'name'=>'required|unique:product,name',
                        'category_id'=>'required',
                        'feature_id'=>'required',
                        'brand_id'=>'required',
                        'color_id.*'=>[
                            new colorProductRule()
                        ],
                        'price.*'=>[
                            'required',
                            'numeric',
                            'min:0'
                        ],
                        'price_sale.*'=>[
                            'nullable',
                            'numeric',
                            'min:0'
                        ],
                        'quantity.*'=>[
                            'required',
                            'numeric',
                            'integer',
                            'min:0'
                        ],
                        'imgae'=>'required',
                        'imgae.*.*'=>[
                            'image', 
                            'mimes:jpeg,png,jpg,gif,svg',
                            'max:2048'
                        ]
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'name'=>'required|unique:product,name,'.$this->id,
                        'category_id'=>'required',
                        'feature_id'=>'required',
                        'brand_id'=>'required',
                        'description'=>'required'
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
                        'feature_id.required'=>'The feature not empty!',
                        'name.required'=>'The name not empty!',
                        'name.unique'=>'The email already exist!',
                        'price.*.required'=>'The price not empty!',
                        'price.*.numeric'=>'The price must number!',
                        'price.*.min'=>'The price minimum value 0!',
                        'price_sale.*.min'=>'The price sale minimum value 0!',
                        'price_sale.*.numeric'=>'The price sale must number!',
                        'quantity.*.required'=>'The quantity not empty!',
                        'quantity.*.min'=>'The quantity minimum value 0!',
                        'quantity.*.numeric'=>'The quantity must number!',
                        'quantity.*.integer'=>'The quantity must integer!'
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'name.required'=>'The name not empty!',
                        'category_id.unique'=>'The name already exist!',
                        'feature_id.required'=>'The name not empty!',
                        'brand_id.required'=>'The name not empty!',
                        'description.required'=>'The description not empty!'
                    ];
                break;
           }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;
use App\Rules\colorProductRule;

class ProductDetailRequest extends FormRequest
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
        // dd($this->method());
        switch ($this->method()) {
            //    Hander Post 
                case 'POST':
                    return [
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
                        'price'=>[
                            'required',
                            'numeric',
                            'min:0'
                        ],
                        'price_sale'=>[
                            'nullable',
                            'numeric',
                            'min:0'
                        ],
                        'quantity'=>[
                            'required',
                            'numeric',
                            'integer',
                            'min:0'
                        ],
                        'imgae.*.*'=>[
                            'image', 
                            'mimes:jpeg,png,jpg,gif,svg',
                            'max:2048'
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
                        'price.*.required'=>'The price not empty!',
                        'price.*.numeric'=>'The price must number!',
                        'price.*.min'=>'The price minimum value 0!',
                        'price_sale.*.required'=>'The price sale not empty!',
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
                        'price.required'=>'The price not empty!',
                        'price.numeric'=>'The price must number!',
                        'price.min'=>'The price minimum value 0!',
                        'price_sale.required'=>'The price sale not empty!',
                        'price_sale.min'=>'The price sale minimum value 0!',
                        'price_sale.numeric'=>'The price sale must number!',
                        'quantity.required'=>'The quantity not empty!',
                        'quantity.min'=>'The quantity minimum value 0!',
                        'quantity.numeric'=>'The quantity must number!',
                        'quantity.integer'=>'The quantity must integer!'
                    ];
                break;
           }
    }
}

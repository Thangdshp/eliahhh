<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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

    public function rules()
    {
       switch ($this->method()) {
        //    Hander Post 
            case 'POST':
                return [
                    'category_blog_id'=>'required',
                    'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:25048',
                    'title_blog'=>'required|unique:blog,title_blog',
                    'content'=>'required',
                    'content_small'=>'required'
                ];
            break;
        //    Hander Get 
            case 'PUT':
                return [
                    'category_blog_id'=>'required',
                    'img'=>'image|mimes:jpeg,png,jpg,gif,svg|max:25048',
                    'title_blog'=>'required|unique:blog,title_blog,'.$this->id,
                    'content'=>'required',
                    'content_small'=>'required'
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
                        'category_blog_id.required'=>'The category blog not empty!',
                        'img.required'=>'The image not empty!',
                        'title_blog.required'=>'The title not empty!',
                        'content.required'=>'The content not empty!',
                        'title_blog.unique'=>'The brand must unique!',
                        'img.image'=>'The file must a image!',
                        'content_small.required'=>'The content small not empty!'
                    ];
                break;
            //    Hander Get 
                case 'PUT':
                    return [
                        'category_blog_id.required'=>'The category blog not empty!',
                        'title_blog.required'=>'The title not empty!',
                        'content.required'=>'The content not empty!',
                        'title_blog.unique'=>'The brand must unique!',
                        'img.image'=>'The file must a image!',
                        'content_small.required'=>'The content small not empty!'
                    ];
                break;
           }
    }
}

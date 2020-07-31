<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\checkPasswordUpdate;

class UserRequest extends FormRequest
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
                        'name'=>'required',
                        'email'=>'required|email|unique:user,email',
                        'password'=>'required',
                        'Ag_password'=>'same:password',
                        'phone'=>'required|regex:/[0-9]{9}/',
                        'address'=>'required',
                        'image'=>'image|mimes:jpeg,png,gif|max:7000',
                        'birth_day'=>'date|before:today'
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'email'=>'required|email|unique:user,email,'.$this->id,
                        'name'=>'required',
                        'phone'=>'required|regex:/[0-9]{9}/',
                        'address'=>'required',
                        'birth_day'=>'date|before:today',
                        'repPassword'=>'same:newPassword',
                        'oldPassword'=> new checkPasswordUpdate()
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
                        'name.required'=>'The name not empty!',
                        'email.required'=>'The email not empty!',
                        'email.email'=>'The email must email!',
                        'password.required'=>'The password not empty!',
                        'Ag_password'=>'The Ag_password mismatched!',
                        'phone.required'=>'The phone not empty!',
                        'phone.regex'=>'The phone Invalid format (0->9 and has 9 number)!',
                        'email.unique'=>'The email must unique!',
                        'address.required'=>'The address not empty!',
                        'image.image'=>'The image must image!',
                        'image.mimes'=>'TThe image Invalid format (jpeg,png,gif)!',
                        'image.max'=>'The image max size 7000 kb!',
                        'birth_day.date'=>'The date of birth must datetime!',
                        'birth_day.before'=>'The date of birth must before today'
                    ];
                break;
            //    Hander Put 
                case 'PUT':
                    return [
                        'name.required'=>'The name not empty!',
                        'email.required'=>'The email not empty!',
                        'email.unique'=>'The email already exist!',
                        'email.email'=>'The email must email!',
                        'birth_day.date'=>'The date of birth must datetime!',
                        'birth_day.before'=>'The date of birth must before today',
                        'address.required'=>'The address not empty!',
                        'phone.required'=>'The phone not empty!',
                        'phone.regex'=>'The phone Invalid format (0->9 and has 9 number)!',
                        'repPassword.same'=>'The Confirm New Password mismatched!'
                    ];
                break;
           }
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkPasswordUpdate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (request()->newPassword!=null||request()->repPassword!=null) {
           if (request()->oldPassword==null) {
              return false;
           }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The old password not empty !';
    }
}

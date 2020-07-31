<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class checkDate implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $check;
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
        $dateNow = Carbon::now();
        if(request()->dateEnd >= date('Y-m-d', strtotime($dateNow->toDateTimeString()))){   
            if (request()->dateEnd >= request()->dateStart) {
                return true;
            }else{
                $this->check=false;
            }
        }else{
            $this->check=true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->check) {
            return 'The date end must >= today!';
        }else{
            return 'The date end must >= date start!';
        }
    }
}

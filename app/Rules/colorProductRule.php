<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class colorProductRule implements Rule
{
    public $checkMess;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
        $colors=request()->color_id;
        $boolean=true;
        $nulls=0;
        $values=0;
       foreach ($colors as $color) {
            if ($color==null) {
              $nulls++;
            }else{
                $values++;
            }
        }
        // Th1 : so ban ghi null = so ban ghi khoi tao , vs checkMess=0
        if (count($colors)== $nulls) {
            if ($nulls==1) {
                return true;
            }else{
                $this->checkMess=0;
                return false;
            }
        }
         // Th2 : Xuat hien null va value , vs checkMess=1
        if ((count($colors)>$nulls && $nulls>0) || count($colors)>$values && $values>0) {
            $this->checkMess=1;
            return false;
        }
        // Th3: Xuat hien full value , vs checkMess=2
        if (count($colors)==$values) {
            if ($values==1) {
                return true;
            }else{
                $quantityValue=array_count_values($colors);
                // dd(count($quantityValue));
                if (array_sum($quantityValue)==count($quantityValue)) {
                    return true;
                }else{
                    $this->checkMess=2;
                    return false;
                }
            }
        }
        // $this->checkMess=0;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // dd($this->checkMess);
       if ($this->checkMess==0) {
            return 'The product only 1 record!';
       }
       if ($this->checkMess==1) {
            return 'All records are color or no color!';
       }     
       if ($this->checkMess==2) {
            return 'The color is not the same!';
       }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Helper\CartHelper;

class DiscountCode extends Model
{
    protected $table='discount_code';
    protected $fillable=['code_sale','date_start','date_end','quantity','ratio','ceilingPrice','priceStart'];
    public function storeRecord(){
        $arr=[
            'code_sale'=>request()->code_sale,
            'date_start'=>request()->dateStart,
            'date_end'=>request()->dateEnd,
            'ceilingPrice'=>request()->ceilingPrice,
            'priceStart'=>request()->priceStart,
            'ratio'=>request()->ratio,
            'quantity'=>request()->quantity
        ];
        return $this->create($arr);
    }
    public function updateRecord(){
        $arr=[
            'code_sale'=>request()->code_sale,
            'date_start'=>request()->dateStart,
            'date_end'=>request()->dateEnd,
            'ratio'=>request()->ratio,
            'ceilingPrice'=>request()->ceilingPrice,
            'priceStart'=>request()->priceStart,
            'quantity'=>request()->quantity
        ];
        return $this->update($arr);
    }
    public function checkCodeDiscount($nameCode){
        $discountItem=DiscountCode::where('code_sale','=',$nameCode)->get();

        if (count($discountItem)>0) {
            $dateNow = Carbon::now();
            $dateF=date('Y-m-d', strtotime($dateNow->toDateTimeString()));
            $dateS=$discountItem[0]->date_start;
            $dateE=$discountItem[0]->date_end; 
            if ($dateF>=$dateS && $dateF<=$dateE) {
                $data=[
                    'status'=>'true',
                    'discount'=>$discountItem[0]
                ];

                return  $data;
            }else{
                $data=[
                    'status'=>'false'
                ];
                return  $data;
            }
        }
        $data=[
            'status'=>'false'
        ];
        return  $data;
    }
}

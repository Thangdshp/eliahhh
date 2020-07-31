<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewLetter extends Model
{
    protected $table='new_letter';
    protected $fillable=[
        'email'
    ];
    public function storeRecord($email){
        $countE=$this->where('email','=',$email)->count();
        if ( $countE==0) {
           $this->create([
               'email'=>$email
           ]);
        }
        return true;
    }
}

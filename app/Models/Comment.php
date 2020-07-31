<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\ProductDetail;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable=['user_id','product_id','content','comment_status'];
    public function storeRecord(){
        $idUser= Auth::user()->id;
        $idProduct=ProductDetail::find(request()->idProductDetail)->product_id;
        if (request()->content!=null) {
            $arr=[
                'user_id'=>$idUser,
                'product_id'=>$idProduct,
                'content'=>request()->content,
                'comment_status'=>1
            ];
            return Comment::create($arr);
        }else{
            return false;
        }
      
        
    }
    public function user(){
        return $this->belongstO(User::class);
    }
}

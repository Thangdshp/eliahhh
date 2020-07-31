<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Rank;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','address','avatar','birth_day','level','user_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Store record to db
     public function storeRecord(){
        $url_img='';
        if (request()->hasFile('image')) {
            $url_img=request()->file('image')->store('avatars');
        }
        $arr=[
            'name'=>request()->name,
            'email'=>request()->email,
            'password'=>Hash::make(request()->password),
            'phone'=>request()->phone,
            'address'=>request()->address,
            'avatar'=>$url_img,
            'birth_day'=>request()->birth_day,
            'user_status'=>request()->user_status,
            'level'=>1
        ];
        return $this->create($arr);
    }
    // Store record to db
    public function updateRecord(){
        $arr=[
            'name'=>request()->name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'address'=>request()->address,
            'birth_day'=>request()->birth_day,
        ];
        if (request()->oldPassword!=null) {
            if (Hash::check(request()->oldPassword,Auth::user()->password)) {
               $arr['password']=Hash::make(request()->newPassword);
            }else{
                // error code 3: Mat khau sai vs database 
                return 3;
            }
        }
        // error code 1: Update thành công
        // error code 0: Update Thất bại
        $errorCode=($this->update($arr))?1:0;
        return $errorCode;
    }
    // Get data from db
    public function getData(){
        return $this->all();
    }
    // Update status user
    public function UpdateStatus(){
        if(request()->id==request()->id_auth){
            return false;
        }
        $user=$this->find(request()->id);
        $user_status=($user->user_status==0)?1:0;
        $arr=[
            'user_status'=>$user_status
        ];
        return $this->find(request()->id)->update($arr);
    }
    // Update image user 
    public function UpdateImage(){
        $url_img='';
        if (request()->hasFile('image')) {
            $url_img=request()->file('image')->store('avatars');
        }
        if ($url_img!='') {
            $arr=[
                'avatar'=>$url_img
            ];
            return $this->find(request()->id)->update($arr);
        }
        return false;
    }
    public function getRank($idProductDetail){
        $idUser=$this->id;
        $Chekcranks=Rank::where([
            ['user_id','=',$idUser],
            ['product_detail_id','=',$idProductDetail]
        ])->avg('rank');
        if ($Chekcranks==null) {
            $Chekcranks=4;
        }
       
        return $Chekcranks;
    }
}

<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public  function index(Wishlist $wishlist){
        $wishs=$wishlist->getData();
        // dd( $wishs);
        return view('frontEnd.Wishlist',compact('wishs'));
    }
    public function add(Wishlist $wishlist , $id){
        $wishlist->storeRecord($id);
        return response()->json([
            'message_alert' => 'Add success product to wishlist',
            'title'=>'success'
        ]);
    }
    public function remove($id){
        Wishlist::destroy($id);
        return response()->json([
            'message_alert' => 'Remove success product to wishlist',
            'title'=>'success'
        ]);
    }
}

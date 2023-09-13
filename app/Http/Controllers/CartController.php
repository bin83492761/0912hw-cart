<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function step1(Request $request){
        // 用這行程式去抓使用者id
        $carts = Cart::where('user_id',$request->user()->id)->get();

        $total = 0;

        // 將商品數量與價格相乘，變成總價
        foreach ($carts as $value) {
            $total += $value->product->price * $value->qty;
        };

        return view('cart_order.order_list',compact('carts','total'));
    }

    public function updateQty(Request $request){
        // $request->validate(){

        // };
    }
}

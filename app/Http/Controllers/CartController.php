<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function step1(Request $request)
    {
        // 用這行程式去抓使用者id
        $carts = Cart::where('user_id', $request->user()->id)->get();

        $total = 0;

        // 將商品數量與價格相乘，變成總價
        foreach ($carts as $value) {
            $total += $value->product->price * $value->qty;
        };

        return view('cart_order.order_list', compact('carts', 'total'));
    }

    public function updateQty(Request $request)
    {

        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'qty' => 'required|numeric|min:1'
        ]);
        // 用Cart這個model去找到$cart這個變數裡面的代號
        // 後續就可以用這個代號做指定資料的部分
        $cart = Cart::find($request->cart_id);

        $updateCart = $cart->update([
            'qty' => $request->qty,
        ]);


        return (object)[
            // $update有執行則1，否則0
            'code' => $updateCart ? 1 : 0,
            'price' => ($cart->product?->price ?? 0) * $cart->qty
        ];
    }
}

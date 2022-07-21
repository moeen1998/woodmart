<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_Products;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create([
            "user_id" => Auth::user()->id,
            "paymethod" => "cash on delever",
            "address" => $request->address,
            "phone" => $request->phone,
            "status" => "shipping",
            "total" => session('total')
        ]);
        $cart = session('cart');
        // dd(count($cart));
        foreach($cart as $item){
            Order_Products::create([
                "order_id" => $order->id,
                "product_id" => $item['id'],
                "qty" => $item['quantity'],
                "color" => "blue"
            ]);
        }
        session()->put('cart', []);session()->put('total', 0);
        return redirect('home');
    }


}

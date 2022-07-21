<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        $categories = Category::all() ?? null;
        $cart = session('cart') ?? null;
        $total = session('total') ?? 0;
        $wish = session('wish') ?? null;

        $data = [
            'categories'=> $categories,
            'cart'=> $cart,
            'total'=> $total,
            'wish'=> $wish,
        ];
        return view('cart')->with('data' , $data);

    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "category" => $product->category,
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->imgs[0]
            ];
        }
        session()->put('cart', $cart);

        $this->updatetotal($cart);

        return redirect()->back();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            $this->updatetotal($cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);

                $this->updatetotal($cart);
            }
            return redirect()->back();
        }
    }
    public function updatetotal($cart)
    {
        $total = 0;
        foreach($cart as $item){
            $total += ( $item['price'] * $item['quantity'] );
        }
        session()->put('total', $total);
    }

}

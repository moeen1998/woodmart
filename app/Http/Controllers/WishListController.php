<?php

namespace App\Http\Controllers;

use App\Models\Wish_list;
use App\Http\Requests\StoreWish_listRequest;
use App\Http\Requests\UpdateWish_listRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function wish()
    {
        $categories = Category::all() ?? null;
        $cart = session('cart') ?? null;
        $total = session('total') ?? 0;
        $wish = session('wish',[]);

        $data = [
            'categories'=> $categories,
            'cart'=> $cart,
            'total'=> $total,
            'wish'=> $wish,
        ];
        return view('wishlist')->with('data' , $data);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToWish($id)
    {
        $product = Product::findOrFail($id);
        $wish = session()->get('wish', []);

        if(!isset($wish[$id])) {
            $wish[$id] = [
                "category" => $product->category,
                "id" => $product->id,
                "name" => $product->name,
                "description" => $product->description,
                "price" => $product->price,
                "image" => $product->imgs[0]
            ];
        }
        session()->put('wish', $wish);

        return redirect()->back();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $wish = session()->get('wish');
            if(isset($wish[$request->id])) {
                unset($wish[$request->id]);
                session()->put('wish', $wish);

            }
            return redirect()->back();
        }
    }
   
}

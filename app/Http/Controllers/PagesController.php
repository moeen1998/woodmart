<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comments;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function categoryproducts(Category $category){
        $products = $category->producs;
        $categories = Category::all() ?? null;
        $cart = session('cart') ?? null;
        $total = session('total') ?? 0;
        $wishes = Auth::check() ? Auth::user()->wishes: null;

        $data = [
            'products'=>$products,
            'categories'=> $categories,
            'cart'=> $cart,
            'total'=> $total,
            'wishes'=> $wishes,
            'categoryname' => $category->name
        ];
        return view('categoryproducts')->with('data' , $data);
    }

    public function productdetails(Product $product){
        $categories = Category::all() ?? null;
        $cart = session('cart') ?? null;
        $total = session('total') ?? 0;
        $wishes = Auth::check() ? Auth::user()->wishes: null;
        $comments = $product->comments;

        // dd($comments[0]->user);

        // dd($comments);
        $data = [
            'categories'=> $categories,
            'cart'=> $cart,
            'total'=> $total,
            'wishes'=> $wishes,
            "product" => $product,
            "comments" => $comments,
        ];
        return view('productdescription')->with('data' , $data);
    }

    public function profile(){
        $categories = Category::all() ?? null;
        $total = session('total') ?? 0;
        $orders = Auth::user()->orders ?? null;

        // dd($orders[2]->products);

        // dd($comments);
        $data = [
            'categories'=> $categories,
            'total'=> $total,
            "orders" => $orders,
        ];
        return view('profile')->with('data' , $data);
    }
    
}

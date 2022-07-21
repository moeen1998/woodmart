<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index(){
        $products = Product::all() ?? null;
        $categories = Category::all() ?? null;
        $cart = session('cart') ?? null;
        $wishes = Auth::check() ? Auth::user()->wishes: null;
        $total = session('total') ?? 0;


        // dd($categories);

        $data = ['products'=>$products,'categories'=> $categories,'cart'=> $cart,'wishes'=> $wishes,'total'=> $total];
        return view('welcome')->with('data' , $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all() ?? null;
        $categories = Category::all() ?? null;
        $cart = session('cart') ?? null;
        $total = session('total') ?? 0;
        $wishes = Auth::check() ?  Auth::user()->wishes: null;

        $data = ['products'=>$products,'categories'=> $categories,'cart'=> $cart,'wishes'=> $wishes,'total'=> $total];
        return view('welcome')->with('data' , $data);
    }
}

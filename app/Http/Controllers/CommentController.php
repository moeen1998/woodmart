<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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

    public function comment(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'comment' => 'required',
        ]);

        Comments::create([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "comment" => $request->comment
        ]);
        return redirect()->back();
    }
}

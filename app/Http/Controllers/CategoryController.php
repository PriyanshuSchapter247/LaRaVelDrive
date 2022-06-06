<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('notes.addcategory');
    }

    public function store(Request $request)
    {
//        return $request->name;
        $request->validate([
            'name' => 'required|min:5',
        ]);

        $category = new Category;
        $user_id = Auth::user()->id;
        $category->user_id = $user_id;
        $category->name = $request->input('name');
        $category->save();
        Mail::raw('you have successful add category on mini drive', function ($msg) {
            $msg->to(Auth::user()->email)->subject('Add category');
        });

        return redirect('home')->with('success', 'category Added successfully.');

    }


}

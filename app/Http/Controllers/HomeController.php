<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
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

    // Home Page with Select Plan

    public function index()
    {
//        return view('home');
//    }

        $user = User::with(['userPlan'])->where('id', auth()->user()->id)->first();
//        $Plan = Plan::where('id', auth()->user()->userPlan);

//        if ($user == $userPlan)
//        {
//            return view('home');
//        }else
//            return view('/plan')->with('danger', 'plaese choose one plan');


        if ($user = $user->userPlan) {
            return view('home');
        } else
            return redirect('plan')->with('danger', 'frist you have to chosen one plan');
    }

}








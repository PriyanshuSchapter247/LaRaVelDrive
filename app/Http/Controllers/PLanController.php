<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PLanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function plan()
    {
        $plans = Plan::all();

//dd($plan);
        return view('plan', compact('plans',
//            'users'
        ));
    }


    public function subscription($id)
    {

//   dd($id);
        $query = DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['plan' => $id]);
        return redirect('/home')->with('success', 'You have successfully select a plan');
    }
}

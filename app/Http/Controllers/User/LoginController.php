<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('enduser.login');
    }

    public function login(Request $request)
    {

        if (auth()->guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->Route('dashboard')->with(['success' => auth()->user()->name.'🤗 Welcome ']);
        }
        return redirect()->back()->with(['errors' => 'There is an error with the data🥺.Check the data and try again🥺']);
    }
    public function logout(){
        Auth::logout();
        Session::forget('yourKeyGoesHere') ;
        session()->regenerate();
        Artisan::call('cache:clear');
        return redirect()->Route('login.form')->with(['errors' => '🥺Successfully LogOut']);

    }
}



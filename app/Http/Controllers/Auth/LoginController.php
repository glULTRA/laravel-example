<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index(){
        return vieW('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        $success = auth()->attempt($request->only('email', 'password'), $request->remember);
        if(!$success){
            return back()->with('status', 'Invaild information for login');
        }

        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function gate()
    {
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('user.home');
        }
    }
}

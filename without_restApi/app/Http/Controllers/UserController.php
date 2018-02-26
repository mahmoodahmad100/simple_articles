<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getLogin()
    {
      return view('auth/login');
    }

    public function PostSignIn(Request $request)
    {
      $this->validate($request,[
          'email' => 'required|email',
          'password' => 'required'
      ]);
      if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
        return redirect()->route('articles.index');
      }
      else {
        return redirect()->back()->with('error_msg','checkout your email or your password is correct');
      }
    }
}

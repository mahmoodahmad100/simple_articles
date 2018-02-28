<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
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

      if( ! $token = JWTAuth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
        return response()->json(['error' => 'please login with the correct data'], HttpResponse::HTTP_UNAUTHORIZED);
      }

      return response()->json(['data' => compact('token')]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function emp_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

        if ($validator -> fails())
        {
            return redirect('/emp')->withErrors($validator)->withInput();
        }
        else
        {
            $remember_me = $request->has('remember') ? true : false; 

            if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me))
                {
                    $user = auth()->user();
                    return Redirect::route('home')->with('success','You have successfully logged in.');
            }else{

                return redirect('/emp')->with('fail','Your password or username is incorrect.');
            }
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/emp')->with(['success' => 'You have successfully signed out.']);
    }
}

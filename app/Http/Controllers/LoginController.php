<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index ()
    {
        return view('pages.login');
    }

    public function authentication (Request $request)
    {

        $user = Users::where('email', '=', $request['email'])
        ->first();

        $email = $request['email'];
        $password = md5($request['password']);

        if ($user != null) {
            if ($user->email == $email && $user->password == $password) {
                Session::put(['admin' => $user]);
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('error', true);
            }
        } else {
            return redirect()->back()->with('error', true);
        }
    }

    public function logout ()
    {
        Session::flush();
        return redirect()->route('login.index');
    }
}
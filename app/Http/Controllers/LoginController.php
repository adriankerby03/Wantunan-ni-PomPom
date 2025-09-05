<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DB::table('tbl_employee')
            ->where('username', $request->username)
            ->first();

        if ($user) {
            if ($request->password === $user->password_hash) {
                Session::put([
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                ]);
                return redirect('/admin-dashboard');
            } else {
                return back()->with('error', 'Invalid password.');
            }
        } else {
            return back()->with('error', 'Username not found.');
        }
    }
}
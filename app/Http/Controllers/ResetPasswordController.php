<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showForm()
    {
        if (!session('pin_verified')) {
            return redirect()->route('password.request')
                ->withErrors(['error' => 'Please verify your PIN first.']);
        }

        return view('reset-password');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $userId = session('reset_user_id');

        DB::table('tbl_employee')->where('id', $userId)->update([
            'password_hash' => Hash::make($request->password),
        ]);

        // Clear session
        session()->forget(['reset_user_id', 'reset_pin', 'pin_verified']);

        return redirect()->route('login.form')->with('status', 'Password updated successfully!');
    }
}

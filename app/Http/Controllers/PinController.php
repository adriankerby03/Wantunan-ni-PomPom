<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinController extends Controller
{
    public function showForm()
    {
        return view('verify-pin');
    }

    public function verify(Request $request)
    {
        $request->validate(['pin' => 'required|numeric']);

        if ($request->pin == session('reset_pin')) {
            session(['pin_verified' => true]);
            return redirect()->route('password.reset');
        }

        return back()->withErrors(['pin' => 'Invalid PIN. Try again.']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForm()
    {
        return view('forgot-password');
    }

    public function sendEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = DB::table('tbl_employee')->where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        // Generate PIN
        $pin = rand(100000, 999999);

        // Store PIN in session
        session([
            'reset_user_id' => $user->id,
            'reset_pin' => $pin,
        ]);

        // Send email
        Mail::send('reset-pin', ['pin' => $pin], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset PIN');
        });
        return redirect()->route('pin.verify')->with('status', 'We sent a PIN to your email.');
    }
}

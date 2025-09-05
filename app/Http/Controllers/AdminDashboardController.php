<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
     public function index(Request $request)
    {
        // Optional: pass user data to the view
        $user = $request->user(); // if using auth

       return view('admin-dashboard');

    }

}

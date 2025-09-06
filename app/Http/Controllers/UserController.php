<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all(); // You can paginate if needed
        return view('admin-user', compact('users'));
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }



    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('edit-user', compact('user'));
}
    
    // Edit a user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $user->update($request->only([
            'username', 'email', 'role', 'first_name', 'middle_name', 'last_name'
        ]));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

}
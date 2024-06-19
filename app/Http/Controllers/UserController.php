<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser() {
        $userData = User::all();
        return view ('adminView.getUser',['userData'=>$userData]);
    }

    public function getUsers($id) {
        $user = User::find($id);
        if (!$user) {
            return response('User not found', 404);
        }
        return view ('adminView.getUsers',['user'=>$user]);
    }

    public function editUser(User $user){
        return view('adminView.editUser',['user'=>$user]);
    }

    public function updateUser(User $user, Request $request){
        $userData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
        ]);
        $user->update($userData);
        return redirect()->route('getUser');
    }

    public function deleteUser (User $user) {
        $user->delete();
        return redirect(route('getUser'));
    }
}

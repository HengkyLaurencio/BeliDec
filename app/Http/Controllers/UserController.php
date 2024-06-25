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
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'is_admin' => 'required|boolean'
        ]);
        
        $user->update($validatedData);
    
        return redirect()->route('getUser')->with('success', 'User updated successfully!');
    }
    
    public function deleteUser (User $user) {
        $user->delete();
        return redirect(route('getUser'));
    }

    public function getBalance(Request $request) {
        $userId = $request->session()->get('user_id');
        return User::where('id', $userId)->value('balance');
    }

    public function viewUpdateBalance(Request $request) {
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);
        return view('updateBalance', ['user' => $user]);
    }

    public function updateBalance(Request $request) {
        $userId = $request->session()->get('user_id');
        User::where('id', $userId)->update(['balance' => $request->balance]);
        return redirect()->back();
    }
}

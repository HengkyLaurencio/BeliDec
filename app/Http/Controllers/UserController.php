<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser() {
        $userData = User::paginate(10);
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
        return redirect(route('getUser'))->with('success', 'Delete successfully');
    }

    public static function getBalance() {
        $user = Auth()->user();
        return $user->balance;
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

    public function payBalance(Request $request) {
        $user = Auth()->user();
        $oldBalance = (float)User::where('id', $user->id)->value('balance');
        $payment = (float)$request->balance;

        if($oldBalance < $payment) {
            return redirect()->back()->with('error', 'Your balance not enough');
        }

        if(!User::where('id', $user->id)->update(['balance' => $oldBalance - $payment])) {
            return redirect()->back()->with('error', 'Payment fail');
        }
        
        Order::where('id', $request->order_id)->update(['status' => 'Completed']);

        return redirect()->back()->with('success', 'Paymet success');
    }
}

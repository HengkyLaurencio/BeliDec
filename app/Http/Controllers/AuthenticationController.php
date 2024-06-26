<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function register()
    {
        return view("authentication.register");
    }
    public function login()
    {
        return view("authentication.login");
    }
    public function changepassword()
    {
        return view(("authentication.changepassword"));
    }
    public function registerPost(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
            'confirmpassword' => ['required'],
        ],[
            'password.min' => 'Password must be more than 8 characters.'
        ]);

        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'This email is already exist.')->withInput();
        }

        if ($request->password != $request->confirmpassword) {
            return redirect()->back()->with('error', 'The password confirmation does not match.')->withInput();
        }

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if (!$user) {
            return redirect(route('register'))->withInput()->with('error', 'Registration Failed, try again.');
        }

        $createCart = Cart::create(['user_id' => $user->id]);

        if (!$createCart) {
            return redirect(route('register'))->withInput()->with('error', 'Cart Failed, try again.');
        }

        return redirect(route('login'))->with('success', 'Registration Success, login to access application');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'password.min' => 'Incorrect Email or Password'
        ]);

        if (Auth::attempt($credentials)) {
            $userId = User::where('email', $request->email)->value('id');
            $request->session()->put('user_id', $userId);

            if(User::where("id", $userId)->value('is_admin')) {
                return redirect()->route('getUser')->with('success', 'Login Success');
            }

            return redirect()->intended(route('home'))->with('success', 'Login Success');
        }

        return redirect()->back()->with('error', 'Incorrect Email or Password.')->withInput();
    }
    public function changepasswordPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
            'newpassword' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid email or current password.')->withInput();
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect(route('home'))->with('success', 'Change Password Success');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

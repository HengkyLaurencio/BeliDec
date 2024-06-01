<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser() {
        $userData = User::all();
        echo '<!DOCTYPE html>
        <html>
            <head>
                <title>Tes</title>
            </head>
            <body>
                <h1>Get All Users</h1>
                <div>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Update</th>
                        </tr>';
                
                foreach ($userData as $user) {
                    echo '<tr>
                            <td>' . $user->id . '</td>
                            <td>' . $user->username . '</td>
                            <td>' . $user->email . '</td>
                            <td> <a href="' . route('editUser', ['user' => $user->id]) . '">Edit</a></td>
                        </tr>';
                }

                echo '    </table>
                </div>
            </body>
        </html>';
    }

    public function getUsers($id) {
        $user = User::find($id);
        if (!$user) {
            return response('User not found', 404);
        }
        echo '<!DOCTYPE html>
        <html>
            <head>
                <title>Tes</title>
            </head>
            <body>
                <h1>Get User Details by ID</h1>
                <p>ID: ' . $user->id . '</p>
                <p>Username: ' . $user->username . '</p>
                <p>Email: ' . $user->email . '</p>
            </body>
        </html>';
    }

    public function editUser (User $user) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Tes</title>
        </head>
        <body>
            <h1>Update User Details</h1>
            <form method="post" action="'.route('updateUser', ['user' => $user->id]) .'">
                <input type="hidden" name="_token" value="' . csrf_token() . '">
                <input type="hidden" name="_method" value="put">
                <div>
                <label>Username<label>
                <input type="text" name="username" placeholder="Username" value="'.$user->username.'">
                </div>
                <div>
                <label>Email<label>
                <input type="text" name="email" placeholder="User email" value="'.$user->email.'">
                </div>
                <div>
                <input type="submit" value="Update User Data">
                </div>
            </form>
        </body>
        </html>';
    }

    public function updateUser(User $user, Request $request) {
        $userData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
        ]);
        
        $user->update($userData);
    
        return redirect()->route('getUser')->with('ok', 'User details updated successfully.');
    }  
}

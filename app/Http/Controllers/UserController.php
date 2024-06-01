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
                </tr>';
        
        foreach ($userData as $user) {
            echo '<tr>
                    <td>' . $user->id . '</td>
                    <td>' . $user->username . '</td>
                    <td>' . $user->email . '</td>
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
}

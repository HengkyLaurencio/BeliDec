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
        <h1>All Users</h1>
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
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            // You might want to add a success message or redirect upon successful deletion.
        } else {
            // Handle case where the user is not found.
        }

        // Redirect back or to a specific route after deletion.
        return back();
    }
}

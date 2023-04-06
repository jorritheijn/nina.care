<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function getAll()
    {
        $users = User::all();
       
        return $users->toArray();
    }
}

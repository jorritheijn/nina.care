<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function getAll(Request $request)
    {
        $users = User::all();

        if ($request->has('name')) {
            $users->where('name', $request->name);
        }

        if ($request->has('email')) {
            $users->where('email', $request->email);
        }

        if ($request->has('phone')) {
            $users->where('phone', $request->phone);
        }

        if ($request->has('age_more_than')) {
            $users->where('age', '>', $request->age_more_than);
        }

        if ($request->has('street')) {
            $users->address()->where('street', $request->street);
        }

        if ($request->has('housenumber')) {
            $users->address()->where('housenumber', $request->housenumber);
        }

        if ($request->has('postalcode')) {
            $users->address()->where('postalcode', $request->postalcode);
        }

        if ($request->has('city')) {
            $users->address()->where('city', $request->city);
        }
        
        if ($request->has('country')) {
            $users->address()->where('country', $request->country);
        }

        return $users->toArray();
    }
}
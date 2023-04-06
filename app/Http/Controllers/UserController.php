<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the users
     */
    public function getAll(Request $request)
    {
        $users = User::all();

        // I think this is a simple way to filter, but quickly becomes bulky when filtering a lot of fields.
        // This can probably be done in a better way by moving this code to a separate filter or the model.
        // And I'm curious what the correct approach would be. I saw a couple packages which looked promising:
        // https://github.com/Tucker-Eric/EloquentFilter
        // https://github.com/mehdi-fathi/eloquent-filter

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

        //filtering relations
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
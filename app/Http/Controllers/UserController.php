<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Foyer;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);


        $user = User::create($userAttributes);


        Auth::login($user);

        return redirect('/');
    }

    public function addIntoFoyer($user_email) {
        $foyer_id = User::where('email', $user_email)->first()->foyer_id;
        $user = auth()->user();
        $user->foyer_id = $foyer_id;
        $user->save();
        return redirect('/');
}
}
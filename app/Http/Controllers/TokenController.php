<?php

namespace App\Http\Controllers;

use App\User;

class TokenController
{
    /**
     * Create a personal token used for testing
     *
     * @return string
     */
    public function personal()
    {
        $user = User::find(1);

        // Creating a token without scopes...
        $token = $user->createToken('Token Name')->accessToken;

        // Creating a token with scopes...
        $token = $user->createToken('My Token', ['place-orders'])->accessToken;

        return $token;
    }

    /**
     * Show the application token dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function tokens()
    {
        return view('tokens');
    }
}
<?php

use \Nowakowskir\JWT\{TokenDecoded, TokenEncoded};

class Authentication
{

    public
    function login(string $username, string $password)
    {
        if (User::where('username', '=', $username)->exists()) {
            return json([
                'succeeded' => 'false',
                'msg' => "{$username} is already taken.",
            ]);
        }

        $user = User::where('username', '=', $username)
            ->get();

        if (!password_verify($password, $user->password)) {
            return json([
                'succeeded' => 'false',
                'msg' => "username or password is wrong.",
            ]);
        }

        var_dump(new TokenDecoded(

        ));
    }

}
<?php

use \Nowakowskir\JWT\{TokenDecoded, TokenEncoded, JWT};

class Authentication
{

    protected array $JWTHeader;
    protected int $exp;
    protected int $privateKey;

    public
    function __construct()
    {
        $authConfig = App::get('config')['authentication'];
        $this->JWTHeader = $authConfig['JWTHeader'];
        $this->exp = $authConfig['exp'];
        $this->privateKey = $authConfig['privateKey'];
    }

    public
    function login()
    {
        $username = $_POST['username'] ?? "";
        $password = $_POST['password'] ?? "";

        if (!User::where('username', '=', $username)->exists()) {
            return json([
                'succeeded' => false,
                'msg' => "username or password is wrong.",
            ]);
        }

        $user = User::where('username', '=', $username)
            ->get()[0];

        if (!password_verify($password, $user->password)) {
            return json([
                'succeeded' => false,
                'msg' => "username or password is wrong.",
            ]);
        }

        $tokenEncoded = (new TokenDecoded(
            payload: [
                'admin' => false,
                'exp' => time() + $this->exp,
            ],
            header: $this->JWTHeader,
        ))->encode(
            $this->privateKey,
            JWT::ALGORITHM_HS256,
        );

        return json([
            'succeeded' => true,
            'token' => $tokenEncoded->toString(),
        ]);
    }

}
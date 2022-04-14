<?php

use \Nowakowskir\JWT\{TokenDecoded, TokenEncoded, JWT};

class Authentication
{
    public static string $algorithm = JWT::ALGORITHM_HS256;
    public static User $user;

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
    function register()
    {
        $username = $_POST['newusername'] ?? "";
        $password = $_POST['newpassword'] ?? "";

        if (User::where('username', '=', $username)->exists()) {
            return json([
                'succeeded' => false,
                'msg' => "username already exists",
            ]);
        }

        $user = new User(0, $username, $password, '');

        $user->insert();

        $tokenEncoded = (
        new TokenDecoded(
            payload: [

                'admin' => false,
                'exp' => time() + $this->exp
            ],
            header: $this->JWTHeader
        ))->encode($this->privateKey, JWT::ALGORITHM_HS256);

        return json([
            'succeeded' => true,
            'token' => $tokenEncoded->toString()]);

    }

    public
    function login()
    {
        $username = Request::payload()->username;
        $password = Request::payload()->password;

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
                'user_id' => $user->id,
                'exp' => time() + $this->exp,
            ],
            header: $this->JWTHeader,
        ))->encode(
            $this->privateKey,
            static::$algorithm,
        );

        return json([
            'succeeded' => true,
            'token' => $tokenEncoded->toString(),
        ]);
    }

    public
    static function authenticate(string $token): bool
    {
        // load config
        $authConfig = App::get('config')['authentication'];
        $JWTHeader = $authConfig['JWTHeader'];
        $exp = $authConfig['exp'];
        $privateKey = $authConfig['privateKey'];

        // validation
        $encodedToken = new TokenEncoded($token);
        if (!$encodedToken->validate($privateKey, static::$algorithm)) {
            redirect('/login');
        }

        // user extraction
        $decodedToken = $encodedToken->decode();
        $payload = $decodedToken->getPayload();
        static::$user = User::find($payload["user_id"]);

        return true;
    }

}
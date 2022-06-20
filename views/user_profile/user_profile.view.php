<!DOCTYPE html>

<html>
    <head>
        <title> Personal Profile </title>
        <link rel="stylesheet" href="/public/js/user_profile.js"></link>
        <script src="/public/js/user_profile.js"></script>
    </head>

    <body>
        <div class = "profile-box">
            <div class = "profile-pic">
                <img src="<?=$user->image_url?>" >
            </div>
            <div class = "profile-name">
                <?=$user->username?>
            </div>
        </div>
    </body>

</html>
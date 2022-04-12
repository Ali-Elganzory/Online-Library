<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9a7861acf7bb7a8188575aaa25489b52
{
    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/core/App.php',
        'Authentication' => __DIR__ . '/../..' . '/controllers/Authentication.php',
        'Book' => __DIR__ . '/../..' . '/models/Book.php',
        'ComposerAutoloaderInit9a7861acf7bb7a8188575aaa25489b52' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit9a7861acf7bb7a8188575aaa25489b52' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'Model' => __DIR__ . '/../..' . '/core/database/Model.php',
        'Pages' => __DIR__ . '/../..' . '/controllers/Pages.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
        'Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Router' => __DIR__ . '/../..' . '/core/Router.php',
        'User' => __DIR__ . '/../..' . '/models/User.php',
        'UserFavourite' => __DIR__ . '/../..' . '/models/UserFavourite.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit9a7861acf7bb7a8188575aaa25489b52::$classMap;

        }, null, ClassLoader::class);
    }
}

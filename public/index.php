<?php

/**
 * Laravel - A PHP Framework For Web Artisans.
 *
 */
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Set Doika Path
|--------------------------------------------------------------------------
|
| Doika path should be outside of public webserver directory, for security
| reasons. `app/public` directory should be symlinked to the web server
| directory, usually using "doika" name. Example:
| /var/www/html/.htaccess
| /var/www/html/index.html
| /var/www/doika
| /var/www/doika/public -> /var/www/html/doika [symlink]
|
*/

$doikaPath = getenv('IS_DOIKA_SYMLINKED') === '1'
    ? dirname(__DIR__, 2).'/doika_v2'
    : dirname(__DIR__, 1);

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require $doikaPath.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once $doikaPath.'/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

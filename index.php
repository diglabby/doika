<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Fallback file
|--------------------------------------------------------------------------
|
| This file is just a fallback for old doika installations,
| where we copy the whole Doika app to the web-server dir (e.g. /etc/www/html).
| For new Doika installations, doika should be located outside a directory server by web-server server,
| but doika/public directory should be linked to as 'doika' to web-server directory.
|
*/

if (getenv('IS_DOIKA_SYMLINKED') === '1') {
    echo 'Web server should not have an access to this index.php when IS_DOIKA_SYMLINKED is used';
    exit(1);
}

require_once __DIR__.'/public/index.php';

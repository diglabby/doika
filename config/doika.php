<?php

return [
    'version' => env('DOIKA_VERSION', env('APP_VERSION', '2.X')),

    /**
     * Prefix for the doika installed to the web server subdirectory
     */
    'url_prefix' => env('DOIKA_URL_PREFIX', 'doika'),
];

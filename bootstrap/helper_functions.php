<?php

declare(strict_types=1);

if (!function_exists('doika_route')) {
    /**
     * Generates a full URL to the doika, even if it's installed to
     * a site’s subdirectory. Uses DOIKA_URL_PREFIX env variable.
     * Examples:
     * 1. Case when Doika installed to the "doika" subdirectory, DOIKA_URL_PREFIX="doika":
     * 1.1. route('dashboard.home') => http://localhost:8080/dashboard (WRONG!)
     * 1.2. doika_route('dashboard.home') => http://localhost:8080/doika/dashboard
     *
     * 2. Doika installed to the root server’s directory (e.g. subdomain), DOIKA_URL_PREFIX=""
     * 2.1. route('dashboard.home') => http://localhost:8080/dashboard
     * 2.2. doika_route('dashboard.home') => http://localhost:8080/dashboard
     *
     * @param string $name
     * @param array|string $parameters
     * @param bool $absolute
     * @return string
     */
    function doika_route(string $name, $parameters = [], bool $absolute = true): string
    {
        $doikaUrlPrefix = config('doika.url_prefix');
        if (!$doikaUrlPrefix) {
            return route($name, $parameters, $absolute);
        }

        return $absolute
            ? url($doikaUrlPrefix.route($name, $parameters, false))
            : '/'.$doikaUrlPrefix.route($name, $parameters, false);
    }
}

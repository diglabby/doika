<?php

namespace Diglabby\Doika\Http\Middleware;

use Diglabby\Doika\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

final class Localize
{
    /** @var Application */
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function handle(Request $request, \Closure $next)
    {
        /** @var Admin $admin */
        $admin = $request->user();
        if ($admin) {
            $this->application->setLocale($admin->locale);
        }

        return $next($request);
    }
}

<?php

declare(strict_types=1);

namespace Diglabby\Doika\Providers;

use Illuminate\Mail\TransportManager;

final class MailServiceProvider extends \Illuminate\Mail\MailServiceProvider
{
    /**
     * Register the Swift Transport instance.
     *
     * @return void
     */
    protected function registerSwiftTransport()
    {
        $this->app->singleton('swift.transport', function () {
            // @todo check performance of this solution
            $this->app['config']['mail'] = [
                'driver' => setting()->get('mail_driver') ?? config('mail.driver'),
                'host' => setting()->get('mail_server_address') ?? config('mail.host'),
                'port' => setting()->get('mail_server_port') ?? config('mail.port'),
                'username' => setting()->get('mail_server_address') ?? config('mail.username'),
                'password' => setting()->get('mail_account_password') ?? config('mail.password'),
                'from' => [
                    'address' => setting()->get('mail_from_address') ?? config('mail.from.address'),
                    'name' => setting()->get('mail_from_name') ?? config('mail.from.name'),
                ],
            ];

            return new TransportManager($this->app);
        });
    }
}

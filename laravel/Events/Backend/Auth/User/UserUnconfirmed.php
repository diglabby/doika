<?php

namespace App\Events\Backend\Auth\User;

use Illuminate\Queue\SerializesModels;

/**
 * Class UserUnconfirmed.
 */
class UserUnconfirmed
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}

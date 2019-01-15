<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the user.
     *
     * @param User             $authenticatedUser
     * @param \App\Models\Payment $payment
     *
     * @return mixed
     *
     * @internal param \App\Models\User $user
     */
    public function view(User $authenticatedUser, Payment $payment)
    {
        return true;
        if ($authenticatedUser->can('view payments')) {
            return true;
        }

        if ($authenticatedUser->can('view own payments')) {
            return $authenticatedUser->id === $payment->user_id;
        }

        //return false;
    }

    /**
     * Determine whether the user can update the payment.
     *
     * @param User             $authenticatedUser
     * @param \App\Models\Payment $payment
     *
     * @return mixed
     *
     * @internal param \App\Models\User $user
     */
    public function update(User $authenticatedUser, Payment $payment)
    {
        return true;
        if ($authenticatedUser->can('edit payments')) {
            return true;
        }

        if ($authenticatedUser->can('edit own payments')) {
            return $authenticatedUser->id === $payment->user_id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the payment.
     *
     * @param User             $authenticatedUser
     * @param \App\Models\Payment $payment
     *
     * @return mixed
     *
     * @internal param \App\Models\User $user
     */
    public function delete(User $authenticatedUser, Payment $payment)
    {
        return true;
        if ($authenticatedUser->can('delete payments')) {
            return true;
        }

        if ($authenticatedUser->can('delete own payments')) {
            return $authenticatedUser->id === $payment->user_id;
        }

        return false;
    }
}

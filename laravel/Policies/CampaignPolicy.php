<?php

namespace App\Policies;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampaignPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the user.
     *
     * @param User             $authenticatedUser
     * @param \App\Models\Campaign $campaign
     *
     * @return mixed
     *
     * @internal param \App\Models\User $user
     */
    public function view(User $authenticatedUser, Campaign $campaign)
    {
        return true;
        if ($authenticatedUser->can('view campaigns')) {
            return true;
        }

        if ($authenticatedUser->can('view own campaigns')) {
            return $authenticatedUser->id === $campaign->user_id;
        }

        //return false;
    }

    /**
     * Determine whether the user can update the campaign.
     *
     * @param User             $authenticatedUser
     * @param \App\Models\Campaign $campaign
     *
     * @return mixed
     *
     * @internal param \App\Models\User $user
     */
    public function update(User $authenticatedUser, Campaign $campaign)
    {
        return true;
        if ($authenticatedUser->can('edit campaigns')) {
            return true;
        }

        if ($authenticatedUser->can('edit own campaigns')) {
            return $authenticatedUser->id === $campaign->user_id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the campaign.
     *
     * @param User             $authenticatedUser
     * @param \App\Models\Campaign $campaign
     *
     * @return mixed
     *
     * @internal param \App\Models\User $user
     */
    public function delete(User $authenticatedUser, Campaign $campaign)
    {
        return true;
        if ($authenticatedUser->can('delete campaigns')) {
            return true;
        }

        if ($authenticatedUser->can('delete own campaigns')) {
            return $authenticatedUser->id === $campaign->user_id;
        }

        return false;
    }
}

<?php

namespace App\Policies;

use App\Models\User;

class FrontstorePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewFrontstore(User $user)
    {
        return $user->role->name !== 'seller';
    }
}

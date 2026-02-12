<?php

namespace App\Policies;

use App\Models\Ocid;
use App\Models\User;

class OcidPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ocid $ocid): bool
    {
        return $user->id === $ocid->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ocid $ocid): bool
    {
        return $user->id === $ocid->user_id;
    }
}

<?php

namespace App\Repositories;

use App\User;

class ContactRepository
{
    /**
     * Get all of the contacts for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->contacts()
            ->orderBy('name', 'asc')
            ->get();
    }
}

<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Contact;

class ContactPolicy
{

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function _destroy(User $user, Contact $contact){
        return ($user->id === $contact->user_id);
    }
}

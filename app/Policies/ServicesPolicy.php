<?php

namespace App\Policies;

use App\Models\Services;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicesPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability){
        if($user->isAdminOrEditor()){
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Services $services)
    {
        return $user->id == $page->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Services $services)
    {
        return $user->id == $page->user_id;
    }

}

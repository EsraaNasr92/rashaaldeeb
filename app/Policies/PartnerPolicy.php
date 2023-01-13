<?php

namespace App\Policies;

use App\Models\User;
use App\Models\partners;
use Illuminate\Auth\Access\HandlesAuthorization;

class PartnerPolicy
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
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, partners $partner)
    {
        return $user->id == $partner->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, partners $partner)
    {
        return $user->id == $partner->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, partners $partners)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\partners  $partners
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, partners $partners)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\banner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
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
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, banner $banner)
    {
        //
    }


}

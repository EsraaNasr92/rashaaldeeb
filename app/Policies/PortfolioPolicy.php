<?php

namespace App\Policies;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
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
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Portfolio $portfolio)
    {
        return $user->id == $partner->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Portfolio $portfolio)
    {
        return $user->id == $partner->user_id;
    }

}

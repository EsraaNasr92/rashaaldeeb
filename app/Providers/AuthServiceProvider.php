<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\User;
use App\Models\Partners;

use App\Policies\PagePolicy;
use App\Policies\PartnerPolicy;
use App\Policies\ManageUsersPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //'App\Models\Model' => 'App\Policies\ModelPolicy',
        //'App\Models\Page' => 'App\Policies\PagePolicy',
        //'App\Models\User' => 'App\Policies\ManageUsersPolicy',
        Page::class => PagePolicy::class,
        User::class => ManageUsersPolicy::class,
        Post::class => PostPolicy::class,
        Partners::class => PartnerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

<?php

namespace App\Providers;

use App\Models\User\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensCan([
            'admin' => 'Admin access',
            'influencer' => 'Influencer access',
        ]);

        Passport::tokensExpireIn(
            now()->addMinutes(config('auth.oauth_tokens_expire_in'))
        );
        Passport::refreshTokensExpireIn(
            now()->addMinutes(config('auth.oauth_refresh_tokens_expire_in'))
        );
        Passport::personalAccessTokensExpireIn(
            now()->addMinutes(config('auth.oauth_personal_access_tokens_expire_in'))
        );

//        Gate::define('view', function (User $user, $model){
//            return $user->hasAccess("view_{$model}") || $user->hasAccess("edit_{$model}");
//        });
//
//        Gate::define('edit', function (User $user, $model){
//            return $user->hasAccess("edit_{$model}");
//        });
    }
}

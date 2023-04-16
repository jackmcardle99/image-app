<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Permissions for owner of a post
        Gate::define('is_post_owner',function (User $user, $post){
            return $user->id == $post->user_id;
        });

        // Permissions for Admin
        Gate::define('is_admin',function(User $user){
            return $user->role == 'admin';
        });

        // Permissions for ordinary user
        Gate::define('is_user',function(User $user){
            return $user->role == 'user';
        });
    }
}

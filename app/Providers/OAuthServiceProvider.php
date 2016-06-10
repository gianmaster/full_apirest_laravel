<?php

namespace App\Providers;

use App\Auth\UserResolver;
use Dingo\Api\Auth\Provider\OAuth2;
use Illuminate\Support\ServiceProvider;


class OAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app('Dingo\Api\Auth\Auth')->extend('oauth', function($app){
            $provider = new OAuth2($app['oauth2-server.authorizer']->getChecker());

            $provider->setUserResolver(function($id){
                //logic to return a user by their ID.
                $resolver = app(UserResolver::class);
                return $resolver->resolveById($id);
            });

            $provider->setClientResolver(function($id){
                //logic to return a client by their ID.

            });

            return $provider;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

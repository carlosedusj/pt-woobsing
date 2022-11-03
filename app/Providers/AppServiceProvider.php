<?php

namespace App\Providers;

use App\Components\GoogleAuthenticator\Google2faComponent;
use App\Repositories\ER\Permiso\{
    PermisoEloquentRepository,
    PermisoQueryBuilderRepository,
    PermisoRepositoryInterface
};

use App\Repositories\ER\Usuario\{
    UsuarioEloquentRepository,
    UsuarioQueryBuilderRepository,
    UsuarioRepositoryInterface
};

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**eloquent way */
        $this->app->bind(UsuarioRepositoryInterface::class,UsuarioEloquentRepository::class);
        $this->app->bind(PermisoRepositoryInterface::class,PermisoEloquentRepository::class);
        
        /**query builder way */
        // $this->app->bind(UsuarioRepositoryInterface::class,UsuarioQueryBuilderRepository::class);
        // $this->app->bind(PermisoRepositoryInterface::class,PermisoQueryBuilderRepository::class);
        
        /**
         * instanciate google authenticator component
         */
        $this->app->singleton(Google2faComponent::class, function($app){
            return new Google2faComponent(app('pragmarx.google2fa'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

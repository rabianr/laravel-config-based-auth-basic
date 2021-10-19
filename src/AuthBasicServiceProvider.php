<?php

namespace Rabianr\Auth;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AuthBasicServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'authbasic');
    }

    /**
     * Register the config for publishing
     *
     * @param  Router  $router
     */
    public function boot(Router $router)
    {
        $this->publishes([$this->configPath() => config_path('authbasic.php')], 'authbasic');

        $router->aliasMiddleware('auth.basic.cb', HandleAuthBasic::class);
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function configPath()
    {
        return dirname(__DIR__) . '/config/authbasic.php';
    }
}

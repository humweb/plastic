<?php
namespace Sleimanx2\Plastic;

use Illuminate\Support\ServiceProvider;

class PlasticServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerManager();

        $this->registerMappings();
    }

    /**
     *  Register plastic's Manager and connection
     */
    protected function registerManager()
    {
        $this->app->singleton('plastic', function ($app) {
            return new PlasticManager($app);
        });

        $this->app->singleton('plastic.connection', function ($app) {
            return $app['plastic']->connection();
        });
    }

    /**
     * Register the mappings service provider
     */
    protected function registerMappings()
    {
        $this->app->register(MappingServiceProvider::class);
    }
}
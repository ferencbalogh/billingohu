<?php
namespace FerencBalogh\Billingohu;

use FerencBalogh\Billingohu\HTTP\Request;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('billingo-request', function() {
            $client = new Request([
                'public_key' => config('billingo.public_key'),
                'private_key' => config('billingo.private_key')
            ]);

            return $client;
        });

        $this->app->alias('billingo-request', Request::class);
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/../config/billingo.php';
        $publishPath = config_path('billingo.php');
        $this->publishes([$configPath => $publishPath], 'config');
    }
}
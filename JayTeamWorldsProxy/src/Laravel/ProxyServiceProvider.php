<?php

namespace JayTeamWorlds\Proxy\Laravel;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use JayTeamWorlds\Proxy\Laravel\Commands\GenerateRsaKeyPair;
use JayTeamWorlds\Proxy\Laravel\Middleware\BlockIfJsonIsUnacceptable;

class ProxyServiceProvider extends ServiceProvider
{
    public function boot(Router $router) : void
    {
        $router->aliasMiddleware('block.if-json-is-unacceptable', BlockIfJsonIsUnacceptable::class);

        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        $this->publishes([
            __DIR__ . '/Config/jayteam-proxy.php' => config_path('jayteam-proxy.php'),
        ], 'config');

        if (! class_exists('CreateShopifyStoresTable')) {
            $this->publishes([
                __DIR__ . '/Database/migrations/create_shopify_stores_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_shopify_stores_table.php'),
            ], 'migrations');
        }

        if (! class_exists('CreateEbayTokensTable')) {
            $this->publishes([
                __DIR__ . '/Database/migrations/create_ebay_tokens_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_ebay_tokens_table.php'),
            ], 'migrations');
        }

        if (! class_exists('CreateEtsyTokensTable')) {
            $this->publishes([
                __DIR__ . '/Database/migrations/create_etsy_tokens_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_etsy_tokens_table.php'),
            ], 'migrations');
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateRsaKeyPair::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/jayteam-proxy.php', 'jayteam-proxy');
    }
}
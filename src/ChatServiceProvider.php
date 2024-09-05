<?php

namespace Fintech\Chat;

use Fintech\Chat\Commands\InstallCommand;
use Fintech\Chat\Providers\RepositoryServiceProvider;
use Fintech\Core\Traits\RegisterPackageTrait;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    use RegisterPackageTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->packageCode = 'chat';

        $this->mergeConfigFrom(
            __DIR__.'/../config/chat.php', 'fintech.chat'
        );

        $this->app->register(RepositoryServiceProvider::class);
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->injectOnConfig();

        $this->publishes([
            __DIR__.'/../config/chat.php' => config_path('fintech/chat.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'chat');

        $this->publishes([
            __DIR__.'/../lang' => $this->app->langPath('vendor/chat'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chat');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/chat'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}

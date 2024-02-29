<?php

namespace Fintech\Chat;

use Fintech\Chat\Commands\ChatCommand;
use Fintech\Chat\Commands\InstallCommand;
use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/chat.php', 'fintech.chat'
        );
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/chat.php' => config_path('fintech/chat.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'chat');

        $this->publishes([
            __DIR__ . '/../lang' => $this->app->langPath('vendor/chat'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'chat');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/chat'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                ChatCommand::class,
            ]);
        }
    }
}

<?php

namespace Pikepa\ContactMe;

use Illuminate\Support\ServiceProvider;

class ContactMeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Export the migration
            if (!class_exists('CreateMessagesTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_messages_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_posts_table.php'),
                    // you can add any number of migrations here
                ], 'migrations');
            }
        }

        if ($this->app->runningInConsole()) {
            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/blogpackage'),
            ], 'views');

            $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
            $this->loadViewsFrom(__DIR__ . '/resources/views', 'blogpackage');
        }
    }
}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $repository_classes = [
            'Package'
        ];

        foreach ($repository_classes as $repository_class) {
            $this->app->bind(
                "App\\Repositories\\Contract\\{$repository_class}RepositoryContract",
                "App\\Repositories\\{$repository_class}Repository"
            );
        }

        $service_classes = [
            'Package'
        ];

        foreach ($service_classes as $service_class) {
            $this->app->bind(
                "App\\Services\\Contract\\{$service_class}ServiceContract",
                "App\\Services\\{$service_class}Service",
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

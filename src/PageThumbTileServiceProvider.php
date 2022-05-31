<?php

namespace Quarterloop\PageThumbTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Quarterloop\PageThumbTile\Commands\FetchPageThumbCommand;

class PageThumbTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchPageThumbCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-page-thumb-tile'),
        ], 'dashboard-page-thumb-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-page-thumb-tile');

        Livewire::component('page-thumb-tile', PageThumbTileComponent::class);
    }
}

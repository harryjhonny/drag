<?php

namespace Harryjhonny\Draggable;

use Illuminate\Support\ServiceProvider;

class DraggableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Drag');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Harryjhonny\Draggable\Http\Controllers\DraggableController');   
    }
}
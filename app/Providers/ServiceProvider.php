<?php

namespace App\Providers;

use Boot\Foundation\Providers\BlackServiceProvider;

abstract class ServiceProvider extends BlackServiceProvider
{
    abstract public function register();
    abstract public function boot();
}

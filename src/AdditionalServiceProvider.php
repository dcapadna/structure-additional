<?php

namespace Dcapi\Structure\Additional;


use Illuminate\Support\ServiceProvider;


class AdditionalServiceProvider extends ServiceProvider
{

    public function register()
    {

    }

    public function boot()
    {
        $this->loadDependencies()
            ->publishDependencies();
    }

    private function loadDependencies()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        $this->mergeConfigFrom(__DIR__.'/config/errors.php','errors');

        return $this;
    }

    private function publishDependencies(){

    }





}

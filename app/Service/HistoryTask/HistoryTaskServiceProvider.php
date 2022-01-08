<?php
namespace App\Service\HistoryTask;

use Illuminate\Support\ServiceProvider;

class HistoryTaskServiceProvider extends ServiceProvider
{
/**
* Register any application services.
*
* @return void
*/
public function register()
{
    $this->app->singleton('history_tasks',function(){
        return new HistoryTask();
    });
}

/**
* Bootstrap any application services.
*
* @return void
*/
public function boot()
{
//
}
}

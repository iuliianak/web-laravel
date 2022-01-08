<?php
namespace App\Service\HistoryTask\Facade;

Use Illuminate\Support\Facades\Facade;


class HistoryTask extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'history_tasks';
    }
}

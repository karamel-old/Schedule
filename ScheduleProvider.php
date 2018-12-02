<?php

use Karamel\Schedule\ScheduleBuilder;

class ScheduleProvider
{
    public function boot()
    {
        (new ScheduleBuilder())->work(new DeleteCache())
            ->everyFiveMinutes();
        (new ScheduleBuilder())->work(new DeleteCache())
            ->everyDay();
    }
}
<?php

use Karamel\Schedule\ScheduleBuilder;

class ScheduleProvider
{
    public function boot()
    {
        $startTime = time();
        (new ScheduleBuilder($startTime))->work(new DeleteCache())
            ->everyFiveMinutes();
        (new ScheduleBuilder($startTime))->work(new DeleteCache())
            ->everyDay();
    }
}
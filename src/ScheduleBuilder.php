<?php

namespace Karamel\Schedule;

use Cron\CronExpression;
use Karamel\Schedule\Interfaces\IScheduleBuilder;

class ScheduleBuilder
{
    private $schedule_code;
    private $work;
    private $runTime;

    public function __construct($runTime)
    {
        $this->runTime = $runTime;
    }

    public function work(IScheduleBuilder $work)
    {
        $this->generateScheduleCode($work);
        $this->work = $work;
        return $this;
    }

    private function generateScheduleCode($work)
    {
        $this->schedule_code = md5(serialize($work));
    }

    public function everyFiveMinutes()
    {
        $cron = CronExpression::factory("*/5 * * * *");
        if ((int)$cron->getNextRunDate(null, 0, true)->format('U') == $this->runTime) {
            $this->work->run();
        }
    }

    public function everyDay()
    {

    }

    private function getScheduleCode($type)
    {
        return $this->schedule_code . '-' . md5($type);
    }

}
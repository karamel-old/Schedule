<?php

namespace Karamel\Schedule;

use Karamel\Schedule\Interfaces\IScheduleBuilder;

class ScheduleBuilder
{
    private $schedule_code;
    private $work;

    private function generateScheduleCode($work)
    {
        $this->schedule_code = md5(serialize($work));
    }

    private function getScheduleCode($type)
    {
        return $this->schedule_code . '-' . md5($type);
    }

    public function work(IScheduleBuilder $work)
    {
        $this->generateScheduleCode($work);
        $this->work = $work;
        return $this;
    }

    public function everyFiveMinutes()
    {
        $file_path = __DIR__ . '/Schedules/' . $this->getScheduleCode('EVERY FIVE MINUTES');
        if (!file_exists($file_path)) {
            $this->work->run();
            file_put_contents($file_path, time());
        }else{
            $lastRun = (int) file_get_contents($file_path);
            if($lastRun == 0){
                //
            }else{
                if(time() - $lastRun > 5*60){
                    $this->work->run();
                    file_put_contents($file_path, time());
                }
            }
        }
    }

    public function everyDay()
    {

    }

}
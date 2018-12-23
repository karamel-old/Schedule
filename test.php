<?php

use Cron\CronExpression;

require_once __DIR__ . '/vendor/autoload.php';
$cron = CronExpression::factory("* * * * *");
$time = time();


$runTime = (int)$cron->getNextRunDate(null, 0, true)->format('U');
if ($runTime == $time) {
    echo "RUN\n";
} else {
    echo "Not Run\n";
    echo "Time : $time \n";
    echo "Run Time : $runTime \n";
}
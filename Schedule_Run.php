<?php
require_once __DIR__ . '/src/Interfaces/IScheduleBuilder.php';
require_once __DIR__ . '/sample/DeleteCache.php';
require_once __DIR__ . '/ScheduleProvider.php';
require_once __DIR__ . '/src/ScheduleBuilder.php';

(new ScheduleProvider())->boot();
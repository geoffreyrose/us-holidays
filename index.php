<?php

require 'vendor/autoload.php';
require 'USHolidays.php';

use USHolidays\Carbon;

$carbon = new Carbon();
$carbon = Carbon::create(2018, 3, 3);
// if( $carbon->isBankHoliday() ):
//     echo 'Yes!<br>';
//     echo $carbon->getHolidayName();
// else:
//     echo 'No.<br>';
// endif;

echo $carbon->getNewYearsDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getMLKDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getPresidentsDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getMemorialDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getIndependenceDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getLaborDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getColumbusDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getVeteransDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getThanksgivingHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getChristmasEveHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getChristmasDayHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';
echo $carbon->getNewYearsEveHoliday(); echo ' - ' . $carbon->getHolidayName(); echo '<br>';

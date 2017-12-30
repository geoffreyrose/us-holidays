# Carbon Support for US Holidays
***
This extends [Carbon](http://carbon.nesbot.com/) and adds support for several US holidays.

### Supported Holidays
 * New Years Day
 * Martin Luther King Jr. Day
 * Groundhog Day
 * Valentine's Day
 * Presidents Day
 * Daylight Saving (End)
 * St. Patrick's Day
 * April Fool's Day
 * Mother's Day
 * Armed Forces Day
 * Memorial Day
 * Flag Day
 * Father's Day
 * Independence Day
 * Labor Day
 * Patriot Day
 * Columbus Day
 * Halloween
 * Veterans Day
 * Thanksgiving
 * Daylight Saving (End)
 * Pearl Harbor Remembrance Day
 * Christmas Eve
 * Christmas Day
 * New Years Eve


### Usage

Basic Setup
```php
<?php
require 'Carbon.php';
require 'USHolidays.php';

use USHolidays\Carbon;
```
Check if date is holiday. Returns `boolean`
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 12, 25);
$carbon->isHoliday(); // bool (true)
```

Get name if date is holiday. Returns `string` or `false`
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 12, 31);
$carbon->getHolidayName(); // New Year's Eve
```

Get date for a specific holiday. Returns `string`
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 1, 1);

$carbon->getNewYearsDayHoliday();                   // 2018-01-01 00:00:00
$carbon->getMLKDayHoliday();                        // 2018-01-15 00:00:00
$carbon->getGroundhogDayHoliday();                  // 2018-02-02 00:00:00
$carbon->getValentinesDayHoliday();                 // 2018-02-14 00:00:00
$carbon->getPresidentsDayHoliday();                 // 2018-02-19 00:00:00
$carbon->getDaylightSavingStartHoliday();           // 2018-03-11 00:00:00
$carbon->getStPatricksDayHoliday();                 // 2018-03-17 00:00:00
$carbon->getAprilFoolsDayHoliday();                 // 2018-04-01 00:00:00
$carbon->getMothersDayHoliday();                    // 2018-05-13 00:00:00
$carbon->getArmedForcesDayHoliday();                // 2018-05-19 00:00:00
$carbon->getMemorialDayHoliday();                   // 2018-05-28 00:00:00
$carbon->getFlagsDayHoliday();                      // 2018-06-14 00:00:00
$carbon->getFathersDayHoliday();                    // 2018-06-17 00:00:00
$carbon->getIndependenceDayHoliday();               // 2018-07-04 00:00:00
$carbon->getLaborDayHoliday();                      // 2018-09-03 00:00:00
$carbon->getPatriotsDayHoliday();                   // 2018-09-11 00:00:00
$carbon->getColumbusDayHoliday();                   // 2018-10-08 00:00:00
$carbon->getHalloweenDayHoliday();                  // 2018-10-31 00:00:00
$carbon->getDaylightSavingEndHoliday();             // 2018-11-04 00:00:00
$carbon->getVeteransDayHoliday();                   // 2018-11-11 00:00:00
$carbon->getThanksgivingHoliday();                  // 2018-11-22 00:00:00
$carbon->getPearlHarborRemembranceHoliday();        // 2018-12-07 00:00:00
$carbon->getChristmasEveHoliday();                  // 2018-12-24 00:00:00
$carbon->getChristmasDayHoliday();                  // 2018-12-25 00:00:00
$carbon->getNewYearsEveHoliday();                   // 2018-12-31 00:00:00
```

### Additional Examples    
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 01, 01);
$carbon->getIndependenceDayHoliday()->getHolidayName(); // Independence Day
```

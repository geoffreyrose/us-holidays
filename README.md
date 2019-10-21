# Carbon Support for US Holidays
This extends [Carbon](http://carbon.nesbot.com/) and adds support for several US holidays.

### Supported Holidays
* April Fool's Day
* Armed Forces Day
* Christmas Day
* Christmas Eve
* Cinco de Mayo
* Columbus Day
* Daylight Saving (End)
* Daylight Saving (Start)
* Earth Day
* Father's Day
* Flag Day
* Groundhog Day
* Halloween
* Independence Day
* Indigenous Peoples' Day
* Juneteenth
* Kwanzaa
* Labor Day
* Martin Luther King Jr. Day
* Memorial Day
* Mother's Day
* New Years Day
* New Years Eve
* Patriot Day
* Pearl Harbor Remembrance Day
* Presidents' Day
* St. Patrick's Day
* Tax Day
* Thanksgiving
* Valentine's Day
* Veterans Day


### Requirements
 * [Carbon](http://carbon.nesbot.com/)
 * PHP 5.5+

### Usage

#### With Composer
```
$ composer require geoffreyrose/us-holidays
```

```php
<?php
require 'vendor/autoload.php';

use USHolidays\Carbon;
```

#### Without Composer

```php
<?php
require 'path/to/nesbot/Carbon.php';
require 'path/to/geoffreyrose/Carbon.php';

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

$carbon->getNewYearsDayHoliday();               // 2018-01-01 00:00:00
$carbon->getMLKDayHoliday();                    // 2018-01-15 00:00:00
$carbon->getGroundhogDayHoliday();              // 2018-02-02 00:00:00
$carbon->getValentinesDayHoliday();             // 2018-02-14 00:00:00
$carbon->getPresidentsDayHoliday();             // 2018-02-19 00:00:00
$carbon->getDaylightSavingStartHoliday();       // 2018-03-11 00:00:00
$carbon->getStPatricksDayHoliday();             // 2018-03-17 00:00:00
$carbon->getAprilFoolsDayHoliday();             // 2018-04-01 00:00:00
$carbon->getTaxDayHoliday();                    // 2018-04-17 00:00:00
$carbon->getEarthDayHoliday();                  // 2018-04-22 00:00:00
$carbon->getCincoDeMayoHoliday();               // 2018-05-05 00:00:00
$carbon->getMothersDayHoliday();                // 2018-05-13 00:00:00
$carbon->getArmedForcesDayHoliday();            // 2018-05-19 00:00:00
$carbon->getMemorialDayHoliday();               // 2018-05-28 00:00:00
$carbon->getFlagsDayHoliday();                  // 2018-06-14 00:00:00
$carbon->getFathersDayHoliday();                // 2018-06-17 00:00:00
$carbon->getJuneteenthHoliday();                // 2018-06-19 00:00:00
$carbon->getIndependenceDayHoliday();           // 2018-07-04 00:00:00
$carbon->getLaborDayHoliday();                  // 2018-09-03 00:00:00
$carbon->getPatriotsDayHoliday();               // 2018-09-11 00:00:00
$carbon->getColumbusDayHoliday();               // 2018-10-08 00:00:00
$carbon->getIndigenousPeoplesDayHoliday();      // 2018-10-08 00:00:00
$carbon->getHalloweenDayHoliday();              // 2018-10-31 00:00:00
$carbon->getDaylightSavingEndHoliday();         // 2018-11-04 00:00:00
$carbon->getVeteransDayHoliday();               // 2018-11-11 00:00:00
$carbon->getThanksgivingHoliday();              // 2018-11-22 00:00:00
$carbon->getPearlHarborRemembranceHoliday();    // 2018-12-07 00:00:00
$carbon->getChristmasEveHoliday();              // 2018-12-24 00:00:00
$carbon->getChristmasDayHoliday();              // 2018-12-25 00:00:00
$carbon->getKwanzaaHoliday();                   // 2018-12-26 00:00:00
$carbon->getNewYearsEveHoliday();               // 2018-12-31 00:00:00
```

Check if date is a Bank Holiday and the day it is observed on. I.E. if the holiday falls on Saturday, the holiday is observed the previous day (Friday). Or if a holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Bank holidays are Monday - Friday Only. So Holidays that are always on weekends are not consider bank holidays. Returns `boolean`
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 03, 17); // St Patrick's Day
$carbon->isBankHoliday(); // bool (false)

$carbon = new Carbon();
$carbon = Carbon::create(2018, 12, 25); // Tuesday
$carbon->isBankHoliday(); // bool (true)

$carbon = new Carbon();
$carbon = Carbon::create(2016, 12, 25); // Sunday
$carbon->isBankHoliday(); // bool (false)

$carbon = new Carbon();
$carbon = Carbon::create(2016, 12, 26); // Monday
$carbon->isBankHoliday(); // bool (true)
```

### Additional Examples    
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 01, 01);
$carbon->getIndependenceDayHoliday()->getHolidayName(); // Independence Day

$carbon = new Carbon();
$carbon = Carbon::create(2016, 12, 25); // Sunday
$carbon->getHolidayName(); // Christmas Day

$carbon = new Carbon();
$carbon = Carbon::create(2016, 12, 26); // Monday
$carbon->getHolidayName(); // Christmas Day (Observed)
```

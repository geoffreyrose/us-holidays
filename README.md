[![Latest Stable Version](https://img.shields.io/packagist/v/geoffreyrose/us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/us-holidays)
[![Total Downloads](https://img.shields.io/packagist/dt/geoffreyrose/us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/us-holidays)
[![Build Status](https://img.shields.io/travis/geoffreyrose/us-holidays/master.svg?style=flat-square)](https://travis-ci.com/geoffreyrose/us-holidays)
[![codecov.io](https://img.shields.io/codecov/c/gh/geoffreyrose/us-holidays?style=flat-square)](https://codecov.io/gh/geoffreyrose/us-holidays)

# Carbon Support for US Holidays
This extends [Carbon](http://carbon.nesbot.com/) and adds support for 41 US holidays.

### Supported Holidays
* April Fool's Day
* Armed Forces Day
* Ash Wednesday
* Black Friday
* Christmas Day
* Christmas Eve
* Cinco de Mayo
* Columbus Day
* Daylight Saving (End)
* Daylight Saving (Start)
* Earth Day
* Easter
* Father's Day
* Flag Day
* Good Friday
* Groundhog Day
* Halloween
* Hanukkah
* Independence Day
* Indigenous Peoples' Day
* Juneteenth
* Kwanzaa
* Labor Day
* Memorial Day
* Martin Luther King Jr. Day
* Mother's Day
* New Year's Day
* New Year's Eve
* Orthodox Easter
* Palm Sunday
* Passover
* Patriot Day
* Pearl Harbor Remembrance Day
* Presidents' Day
* Rosh Hashanah
* St. Patrick's Day
* Tax Day
* Thanksgiving
* Valentine's Day
* Veterans Day
* Yom Kippur


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

$carbon->getAprilFoolsDayHoliday();              // 2020-04-01 00:00:00
$carbon->getArmedForcesDayHoliday();             // 2020-05-16 00:00:00
$carbon->getAshWednesdayHoliday();               // 2020-02-26 00:00:00
$carbon->getBlackFridayHoliday();                // 2020-11-27 00:00:00
$carbon->getChristmasDayHoliday();               // 2020-12-25 00:00:00
$carbon->getChristmasEveHoliday();               // 2020-12-24 00:00:00
$carbon->getCincoDeMayoHoliday();                // 2020-05-05 00:00:00
$carbon->getColumbusDayHoliday();                // 2020-10-12 00:00:00
$carbon->getDaylightSavingEndHoliday();          // 2020-11-01 00:00:00
$carbon->getDaylightSavingStartHoliday();        // 2020-03-08 00:00:00
$carbon->getEarthDayHoliday();                   // 2020-04-22 00:00:00
$carbon->getEasterHoliday();                     // 2020-04-12 00:00:00
$carbon->getFathersDayHoliday();                 // 2020-06-21 00:00:00
$carbon->getFlagDayHoliday();                    // 2020-06-14 00:00:00
$carbon->getGoodFridayHoliday();                 // 2020-04-10 00:00:00
$carbon->getGroundhogDayHoliday();               // 2020-02-02 00:00:00
$carbon->getHalloweenHoliday();                  // 2020-10-31 00:00:00
$carbon->getHanukkahHoliday();                   // 2020-12-11 00:00:00
$carbon->getIndependenceDayHoliday();            // 2020-07-04 00:00:00
$carbon->getIndigenousPeoplesDayHoliday();       // 2020-10-12 00:00:00
$carbon->getJuneteenthHoliday();                 // 2020-06-19 00:00:00
$carbon->getKwanzaaHoliday();                    // 2020-12-26 00:00:00
$carbon->getLaborDayHoliday();                   // 2020-09-07 00:00:00
$carbon->getMemorialDayHoliday();                // 2020-05-25 00:00:00
$carbon->getMLKDayHoliday();                     // 2020-01-20 00:00:00
$carbon->getMothersDayHoliday();                 // 2020-05-10 00:00:00
$carbon->getNewYearsDayHoliday();                // 2020-01-01 00:00:00
$carbon->getNewYearsEveHoliday();                // 2020-12-31 00:00:00
$carbon->getOrthodoxEasterHoliday();             // 2020-04-19 00:00:00
$carbon->getPalmSundayHoliday();                 // 2020-04-05 00:00:00
$carbon->getPassoverHoliday();                   // 2020-04-09 00:00:00
$carbon->getPatriotDayHoliday();                 // 2020-09-11 00:00:00
$carbon->getPearlHarborRemembranceDayHoliday();  // 2020-12-07 00:00:00
$carbon->getPresidentsDayHoliday();              // 2020-02-17 00:00:00
$carbon->getRoshHashanahHoliday();               // 2020-09-19 00:00:00
$carbon->getStPatricksDayHoliday();              // 2020-03-17 00:00:00
$carbon->getTaxDayHoliday();                     // 2020-04-15 00:00:00
$carbon->getThanksgivingHoliday();               // 2020-11-26 00:00:00
$carbon->getValentinesDayHoliday();              // 2020-02-14 00:00:00
$carbon->getVeteransDayHoliday();                // 2020-11-11 00:00:00
$carbon->getYomKippurHoliday();                  // 2020-09-28 00:00:00

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
$carbon->getHolidayName(); // Christmas Day (Observed), Kwanzaa
```

### Contributing

1. Clone the repo and install dependencies.

```
composer install
```

2. Run Tests

Use locally installed carbon version

```
$ ./vendor/bin/phpunit
```

----

Test against Carbon v1
```
$ ./tests/carbon-1.sh
```

Test against Carbon v2
```
$ ./tests/carbon-2.sh
```

Test Both Carbon v1 and v2
```
$ ./tests/carbon-1-2.sh
```

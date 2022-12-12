<div style="text-align: center;"> 

[![Latest Stable Version](https://img.shields.io/packagist/v/geoffreyrose/us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/us-holidays)
[![Total Downloads](https://img.shields.io/packagist/dt/geoffreyrose/us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/us-holidays/stats)
[![GitHub Workflow Status](https://img.shields.io/github/workflow/status/geoffreyrose/us-holidays/PHP%20CI?style=flat-square)](https://github.com/geoffreyrose/us-holidays/actions?query=branch%3Amaster)
[![Codecov branch](https://img.shields.io/codecov/c/gh/geoffreyrose/us-holidays/master?style=flat-square)](https://app.codecov.io/gh/geoffreyrose/us-holidays/branch/master)
[![License](https://img.shields.io/github/license/geoffreyrose/us-holidays?style=flat-square)](https://github.com/geoffreyrose/us-holidays/blob/master/LICENSE)
</div>

# Carbon Support for US Holidays
This extends [Carbon](http://carbon.nesbot.com/) and adds support for 41 US holidays.

## Full Documentation
**v2.x**  
[https://geoffreyrose.github.io/us-holidays/](https://geoffreyrose.github.io/us-holidays/)

**v1.x**  
[https://github.com/geoffreyrose/us-holidays/blob/8717adad63c489e3ef65619e4272bb9b21718078/README.md](https://github.com/geoffreyrose/us-holidays/blob/8717adad63c489e3ef65619e4272bb9b21718078/README.md)

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
* PHP 7.0+

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


### Get Holiday By Year

See [documentation](https://geoffreyrose.github.io/us-holidays/#getHolidaysByYear) for more details

```php
$carbon = Carbon::create(2020, 1, 1);
$holidays = $carbon->getHolidaysByYear('all');

// [
//     {
//         "name": "New Year's Day", // string
//         "date": "2020-01-01 00:00:00", // DateTime object
//         "bank_holiday": true, // boolean
//         "days_away": 0, // int
//     },
//     {
//     	"name": "Martin Luther King Jr. Day", // string
//     	"date": "2020-01-20 00:00:00", // DateTime object
//     	"bank_holiday": true, // boolean
//     	"days_away": 19 // int
//     }
//     ...
// ]
```

### Get Holiday In Days

See [documentation](https://geoffreyrose.github.io/us-holidays/#getHolidaysInDays) for more details

```php
$carbon = Carbon::create(2020, 5, 28);

$holidays = $carbon->getHolidaysInDays(300, 'all');
// or
$holidays = $carbon->getHolidaysInDays(300);

// [
//     {
//         "name": "Flag Day", // string
//         "date": "2020-06-14 00:00:00", // DateTime object
//         "bank_holiday": false, // boolean
//         "days_away": 17 // int
//     }, {
//         "name": "Juneteenth", // string
//         "date": "2020-06-19 00:00:00", // DateTime object
//         "bank_holiday": false, // boolean
//         "days_away": 22 // int
//     },
//     ...
// ]
```


### Get Holiday In Years

See [documentation](https://geoffreyrose.github.io/us-holidays/#getHolidaysInYears) for more details

```php
$carbon = Carbon::create(2020, 8, 18);

$holidays = $carbon->getHolidaysInYears(1, 'all');
// or
$holidays = $carbon->getHolidaysInYears(1);

// [
//     {
//     	"name": "Labor Day", // string
//     	"date": "2020-09-07 00:00:00", // DateTime object
//     	"bank_holiday": true,// boolean
//     	"days_away": 20 // int
//     }, {
//     	"name": "Patriot Day", // string
//     	"date": "2020-09-11 00:00:00", // DateTime object
//     	"bank_holiday": false, // boolean
//     	"days_away": 24 // int
//     },
//     ...
// ]
```



### Get Holiday Date

See [documentation](https://geoffreyrose.github.io/us-holidays/#getAprilFoolsDayHoliday) for more details


```php
$carbon = Carbon::create(2020, 1, 1);
$carbon->getAprilFoolsDayHoliday();

// {
//    "name": "April Fool's Day",
//    "date": "2020-04-01 00:00:00",
//    "bank_holiday": false
//    "days_away": 91
// }
```
```php
$carbon->getAprilFoolsDayHoliday();              
$carbon->getArmedForcesDayHoliday();             
$carbon->getAshWednesdayHoliday();               
$carbon->getBlackFridayHoliday();                
$carbon->getChristmasDayHoliday();               
$carbon->getChristmasEveHoliday();               
$carbon->getCincoDeMayoHoliday();                
$carbon->getColumbusDayHoliday();                
$carbon->getDaylightSavingEndHoliday();          
$carbon->getDaylightSavingStartHoliday();        
$carbon->getEarthDayHoliday();                   
$carbon->getEasterHoliday();                     
$carbon->getFathersDayHoliday();                 
$carbon->getFlagDayHoliday();                    
$carbon->getGoodFridayHoliday();                 
$carbon->getGroundhogDayHoliday();               
$carbon->getHalloweenHoliday();                  
$carbon->getHanukkahHoliday();                   
$carbon->getIndependenceDayHoliday();            
$carbon->getIndigenousPeoplesDayHoliday();       
$carbon->getJuneteenthHoliday();                 
$carbon->getKwanzaaHoliday();                    
$carbon->getLaborDayHoliday();                   
$carbon->getMemorialDayHoliday();                
$carbon->getMLKDayHoliday();                     
$carbon->getMothersDayHoliday();                 
$carbon->getNewYearsDayHoliday();                
$carbon->getNewYearsEveHoliday();                
$carbon->getOrthodoxEasterHoliday();             
$carbon->getPalmSundayHoliday();                 
$carbon->getPassoverHoliday();                   
$carbon->getPatriotDayHoliday();                 
$carbon->getPearlHarborRemembranceDayHoliday();  
$carbon->getPresidentsDayHoliday();              
$carbon->getRoshHashanahHoliday();               
$carbon->getStPatricksDayHoliday();              
$carbon->getTaxDayHoliday();                     
$carbon->getThanksgivingHoliday();               
$carbon->getValentinesDayHoliday();              
$carbon->getVeteransDayHoliday();                
$carbon->getYomKippurHoliday();                  

```

### isHoliday()

See [documentation](https://geoffreyrose.github.io/us-holidays/#isHoliday) for more details

Check if date is holiday. Returns `boolean`
```php
$carbon = new Carbon();
$carbon = Carbon::create(2018, 12, 25);
$carbon->isHoliday(); // bool (true)
```

### isBankHoliday()

See [documentation](https://geoffreyrose.github.io/us-holidays/#isBankHoliday) for more details

Check if date is a Bank Holiday and the day it is observed on. I.E. if the holiday falls if a holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Bank holidays are Monday - Friday Only. Holidays that are always on weekends are not consider bank holidays. Also holidays that are Bank Holidays but fall on Saturday are NOT observed on the previous Friday. Returns `boolean`
```php
$carbon = Carbon::create(2020, 1, 1); // New Years Day - Wednesday
$carbon->isBankHoliday(); // boolean (true)

$carbon = Carbon::create(2020, 1, 2);
$carbon->isBankHoliday(); // boolean (false)

$carbon = Carbon::create(2018, 03, 17); // St Patrick's Day
$carbon->isBankHoliday(); // boolean (false)

$carbon = Carbon::create(2018, 12, 25); // Christmas - Tuesday
$carbon->isBankHoliday(); // boolean (true)

$carbon = Carbon::create(2016, 12, 25); // Christmas - Sunday
$carbon->isBankHoliday(); // boolean (false)

$carbon = Carbon::create(2016, 12, 26); // Monday
$carbon->isBankHoliday(); // boolean (true)

$carbon = Carbon::create(2021, 12, 25); // Christmas - Saturday
$carbon->isBankHoliday(); // boolean (false)

$carbon = Carbon::create(2021, 12, 24); // Friday
$carbon->isBankHoliday(); // boolean (false)
```

### isFederalHoliday()

See [documentation](https://geoffreyrose.github.io/us-holidays/#isFederalHoliday) for more details

Check if date is a Federal Holiday and the day it is observed on. I.E. if the holiday falls on Saturday, the holiday is observed the previous day (Friday). Or if a holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Federal holidays are Monday - Friday Only. Holidays that are always on weekends are not consider bank holidays. Returns `boolean`
```php
$carbon = Carbon::create(2020, 1, 1); // New Years Day - Wednesday
$carbon->isFederalHoliday(); // boolean (true)

$carbon = Carbon::create(2020, 1, 2);
$carbon->isFederalHoliday(); // boolean (false)

$carbon = Carbon::create(2018, 03, 17); // St Patrick's Day
$carbon->isFederalHoliday(); // boolean (false)

$carbon = Carbon::create(2018, 12, 25); // Christmas - Tuesday
$carbon->isFederalHoliday(); // boolean (true)

$carbon = Carbon::create(2016, 12, 25); // Christmas - Sunday
$carbon->isFederalHoliday(); // boolean (false)

$carbon = Carbon::create(2016, 12, 26); // Monday
$carbon->isFederalHoliday(); // boolean (true)

$carbon = Carbon::create(2021, 12, 25); // Christmas - Saturday
$carbon->isFederalHoliday(); // boolean (false)

$carbon = Carbon::create(2021, 12, 24); // Friday
$carbon->isFederalHoliday(); // boolean (true)
```

### Get Holiday Name

See [documentation](https://geoffreyrose.github.io/us-holidays/#getHolidayName) for more details

Get name if date is holiday. Returns `string` or `false`
```php
$carbon = Carbon::create(2018, 12, 31);
$carbon->getHolidayName(); // New Year's Eve
```


### Add Own Holiday

See [documentation](https://geoffreyrose.github.io/us-holidays/#addHoliday) for more details

```php
$carbon = new Carbon();
$carbon->addHoliday([
    'name' => "Spongebob's Birthday",
    'date' => Carbon::create(1986, 7, 14),
    'bank_holiday' => false
]);

$carbon->addHoliday([
    'name' => "Q1 Tax Payments",
    'date' => function() use($carbon) {
        $q1 = Carbon::create($carbon->year, 4, 15, 0, 0, 0);
        if($q1->isBankHoliday()) {
            $q1->addDay();

            if($q1->isWeekend()) {
                $q1->next(Carbon::MONDAY);
            }
        }

        if($q1->isWeekend()) {
            $q1->next(Carbon::MONDAY);
        }

        if($q1 < $carbon) {
            $q1 = Carbon::create($carbon->year + 1, 4, 15, 0, 0, 0);

            if($q1->isBankHoliday()) {
                $q1->addDay();

                if($q1->isWeekend()) {
                    $q1->next(Carbon::MONDAY);
                }
            }

            if($q1->isWeekend()) {
                $q1->next(Carbon::MONDAY);
            }
        }

        if($q1->isBankHoliday()) {
            $q1->addDay();
        }

        return $q1;
    },
    'bank_holiday' => false
]);
```

### Additional Examples
```php
$carbon = Carbon::create(2016, 12, 25); // Sunday
$carbon->getHolidayName(); // Christmas Day

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

// or with coverage 

$ XDEBUG_MODE=coverage ./vendor/bin/phpunit
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


### See It Used in the Wild
[GBPN](https://gbpn.com/resources/branding-and-design/us-holiday-calendar) - Ongoing US Holiday Calendar  
[Canny Armadillo](https://cannyarmadillo.com/resources/us-holiday-calendar) - Next 12 Months

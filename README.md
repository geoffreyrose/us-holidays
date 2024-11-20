<div style="text-align: center;"> 

[![Latest Stable Version](https://img.shields.io/packagist/v/geoffreyrose/us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/us-holidays)
[![Total Downloads](https://img.shields.io/packagist/dt/geoffreyrose/us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/us-holidays/stats)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/geoffreyrose/us-holidays/main.yml?branch=master&style=flat-square)](https://github.com/geoffreyrose/us-holidays/actions?query=branch%3Amaster)
[![Codecov branch](https://img.shields.io/codecov/c/gh/geoffreyrose/us-holidays/master?style=flat-square)](https://app.codecov.io/gh/geoffreyrose/us-holidays/branch/master)
[![License](https://img.shields.io/github/license/geoffreyrose/us-holidays?style=flat-square)](https://github.com/geoffreyrose/us-holidays/blob/master/LICENSE)
</div>

# PHP: Adds Carbon Support for US Holidays + Laravel Facade
This extends [Carbon](http://carbon.nesbot.com/) and adds support for 42 US holidays.

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
* Cyber Monday
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
* Martin Luther King Jr. Day
* Memorial Day
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
* PHP 7.4+ | 8.0+

### Usage

#### Installation
```
composer require geoffreyrose/us-holidays
```

### With Plain PHP
```php
use USHolidays\USHolidays;

...

$holidays = USHolidays::create(2020, 1, 1);
$holidays = $holidays->getHolidaysByYear();
```

### With Laravel Facade
Laravel uses Package Auto-Discovery, which doesn't require you to manually add the ServiceProvider and Facade.
```php
$holidays = USHolidays::getHolidaysByYear();
```


## Examples

**Note all examples below use Plain PHP (use USHolidays\USHolidays) but can be swapped with Laravel Facade (USHolidays)**

### Get Holiday By Year

See [documentation](https://geoffreyrose.github.io/us-holidays/#getHolidaysByYear) for more details

```php
$holidays = USHolidays::create(2020, 1, 1);
$holidays = $holidays->getHolidaysByYear('all');

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
$holidays = USHolidays::create(2020, 5, 28);

$holidays = $holidays->getHolidaysInDays(300, 'all');
// or
$holidays = $holidays->getHolidaysInDays(300);

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
$holidays = USHolidays::create(2020, 8, 18);

$holidays = $holidays->getHolidaysInYears(1, 'all');
// or
$holidays = $holidays->getHolidaysInYears(1);

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
$holidays = USHolidays::create(2020, 1, 1);
$holidays->getAprilFoolsDayHoliday();

// {
//    "name": "April Fool's Day",
//    "date": "2020-04-01 00:00:00",
//    "bank_holiday": false
//    "days_away": 91
// }
```
```php
$holidays->getAprilFoolsDayHoliday();              
$holidays->getArmedForcesDayHoliday();             
$holidays->getAshWednesdayHoliday();               
$holidays->getBlackFridayHoliday();                
$holidays->getChristmasDayHoliday();    
$holidays->getChristmasEveHoliday();               
$holidays->getCincoDeMayoHoliday();                
$holidays->getColumbusDayHoliday();                
$holidays->getCyberMondayHoliday();           
$holidays->getDaylightSavingEndHoliday();          
$holidays->getDaylightSavingStartHoliday();        
$holidays->getEarthDayHoliday();                   
$holidays->getEasterHoliday();                     
$holidays->getFathersDayHoliday();                 
$holidays->getFlagDayHoliday();                    
$holidays->getGoodFridayHoliday();                 
$holidays->getGroundhogDayHoliday();               
$holidays->getHalloweenHoliday();                  
$holidays->getHanukkahHoliday();                   
$holidays->getIndependenceDayHoliday();            
$holidays->getIndigenousPeoplesDayHoliday();       
$holidays->getJuneteenthHoliday();                 
$holidays->getKwanzaaHoliday();                    
$holidays->getLaborDayHoliday();                   
$holidays->getMLKDayHoliday();                     
$holidays->getMemorialDayHoliday();                
$holidays->getMothersDayHoliday();                 
$holidays->getNewYearsDayHoliday();                
$holidays->getNewYearsEveHoliday();                
$holidays->getOrthodoxEasterHoliday();             
$holidays->getPalmSundayHoliday();                 
$holidays->getPassoverHoliday();                   
$holidays->getPatriotDayHoliday();                 
$holidays->getPearlHarborRemembranceDayHoliday();  
$holidays->getPresidentsDayHoliday();              
$holidays->getRoshHashanahHoliday();               
$holidays->getStPatricksDayHoliday();              
$holidays->getTaxDayHoliday();                     
$holidays->getThanksgivingHoliday();               
$holidays->getValentinesDayHoliday();              
$holidays->getVeteransDayHoliday();                
$holidays->getYomKippurHoliday();
```

### isHoliday()

See [documentation](https://geoffreyrose.github.io/us-holidays/#isHoliday) for more details

Check if date is holiday. Returns `boolean`
```php
$holidays = USHolidays::create(2018, 12, 25);
$holidays->isHoliday(); // bool (true)
```

### isBankHoliday()

See [documentation](https://geoffreyrose.github.io/us-holidays/#isBankHoliday) for more details

Check if date is a Bank Holiday and the day it is observed on. I.E. if the holiday falls if a holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Bank holidays are Monday - Friday Only. Holidays that are always on weekends are not consider bank holidays. Also holidays that are Bank Holidays but fall on Saturday are NOT observed on the previous Friday. Returns `boolean`
```php
$holidays = USHolidays::create(2020, 1, 1); // New Years Day - Wednesday
$holidays->isBankHoliday(); // boolean (true)

$holidays = USHolidays::create(2020, 1, 2);
$holidays->isBankHoliday(); // boolean (false)

$holidays = USHolidays::create(2018, 03, 17); // St Patrick's Day
$holidays->isBankHoliday(); // boolean (false)

$holidays = USHolidays::create(2018, 12, 25); // Christmas - Tuesday
$holidays->isBankHoliday(); // boolean (true)

$holidays = USHolidays::create(2016, 12, 25); // Christmas - Sunday
$holidays->isBankHoliday(); // boolean (false)

$holidays = USHolidays::create(2016, 12, 26); // Monday
$holidays->isBankHoliday(); // boolean (true)

$holidays = USHolidays::create(2021, 12, 25); // Christmas - Saturday
$holidays->isBankHoliday(); // boolean (false)

$holidays = USHolidays::create(2021, 12, 24); // Friday
$holidays->isBankHoliday(); // boolean (false)
```

### isFederalHoliday()

See [documentation](https://geoffreyrose.github.io/us-holidays/#isFederalHoliday) for more details

Check if date is a Federal Holiday and the day it is observed on. I.E. if the holiday falls on Saturday, the holiday is observed the previous day (Friday). Or if a holiday falls on Sunday, the holiday is observed the next day (Monday). Note: Federal holidays are Monday - Friday Only. Holidays that are always on weekends are not consider bank holidays. Returns `boolean`
```php
$holidays = USHolidays::create(2020, 1, 1); // New Years Day - Wednesday
$holidays->isFederalHoliday(); // boolean (true)

$holidays = USHolidays::create(2020, 1, 2);
$holidays->isFederalHoliday(); // boolean (false)

$holidays = USHolidays::create(2018, 03, 17); // St Patrick's Day
$holidays->isFederalHoliday(); // boolean (false)

$holidays = USHolidays::create(2018, 12, 25); // Christmas - Tuesday
$holidays->isFederalHoliday(); // boolean (true)

$holidays = USHolidays::create(2016, 12, 25); // Christmas - Sunday
$holidays->isFederalHoliday(); // boolean (false)

$holidays = USHolidays::create(2016, 12, 26); // Monday
$holidays->isFederalHoliday(); // boolean (true)

$holidays = USHolidays::create(2021, 12, 25); // Christmas - Saturday
$holidays->isFederalHoliday(); // boolean (false)

$holidays = USHolidays::create(2021, 12, 24); // Friday
$holidays->isFederalHoliday(); // boolean (true)
```

### Get Holiday Name

See [documentation](https://geoffreyrose.github.io/us-holidays/#getHolidayName) for more details

Get name if date is holiday. Returns `string` or `false`
```php
$holidays = USHolidays::create(2018, 12, 31);
$holidays->getHolidayName(); // New Year's Eve
```


### Add Own Holiday

See [documentation](https://geoffreyrose.github.io/us-holidays/#addHoliday) for more details

```php
$holidays->addHoliday([
    'name' => "Spongebob's Birthday",
    'date' => USHolidays::create(1986, 7, 14),
    'bank_holiday' => false
]);

$holidays->addHoliday([
    'name' => "Q1 Tax Payments",
    'date' => function() use($holidays) {
        $q1 = USHolidays::create($holidays->year, 4, 15, 0, 0, 0);
        if($q1->isBankHoliday()) {
            $q1->addDay();

            if($q1->isWeekend()) {
                $q1->next(USHolidays::MONDAY);
            }
        }

        if($q1->isWeekend()) {
            $q1->next(USHolidays::MONDAY);
        }

        if($q1 < $holidays) {
            $q1 = USHolidays::create($holidays->year + 1, 4, 15, 0, 0, 0);

            if($q1->isBankHoliday()) {
                $q1->addDay();

                if($q1->isWeekend()) {
                    $q1->next(USHolidays::MONDAY);
                }
            }

            if($q1->isWeekend()) {
                $q1->next(USHolidays::MONDAY);
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
$holidays = USHolidays::create(2016, 12, 25); // Sunday
$holidays->getHolidayName(); // Christmas Day

$holidays = USHolidays::create(2016, 12, 26); // Monday
$holidays->getHolidayName(); // Christmas Day (Observed), Kwanzaa
```

### Contributing

1. Clone the repo and install dependencies.

```
composer install
```

2. Run Tests

Use locally installed carbon version

```
./vendor/bin/phpunit

// or with coverage 

XDEBUG_MODE=coverage ./vendor/bin/phpunit
```

----

Test against Carbon v2
```
./tests/carbon-2.sh
```

Test against Carbon v3
```
./tests/carbon-3.sh
```

### See It Used in the Wild
[GBPN](https://gbpn.com/resources/branding-and-design/us-holiday-calendar) - Ongoing US Holiday Calendar  
[Canny Armadillo](https://cannyarmadillo.com/resources/us-holiday-calendar) - Next 12 Months

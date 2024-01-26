<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonImmutable;
use USHolidays\HolidayInterface;

class ChristmasDay implements HolidayInterface
{
    public static string $name = 'Christmas Day';

    public static array $searchNames = ['CHRISTMAS DAY', 'CHRISTMAS'];

    public static bool $bankHoliday = true;

    public static bool $federalHoliday = true;

    public static int|null $startYear = 336;

    public static int|null $endYear = null;

    public static int|null $bankHolidayStartYear = 1870;

    public static int|null $bankHolidayEndYear = null;

    public static int|null $federalHolidayStartYear = 1870;

    public static int|null $federalHolidayEndYear = null;

    /**
     * Setting Christmas Day
     *
     * @param int $year The year to get the holiday in
     */
    public static function setHoliday(int $year)
    {
        return CarbonImmutable::create($year, 12, 25, 0, 0, 0);
    }

    public function getHoliday(int $year)
    {
        return (object) [
            'name' => self::$name,
            'search_names' => self::$searchNames,
            'date' => $this->setHoliday($year),
            'bank_holiday' => self::$bankHoliday,
            'federal_holiday' => self::$federalHoliday,
            'start_year' => self::$startYear,
            'end_year' => self::$endYear,
            'bank_holiday_start_year' => self::$bankHolidayStartYear,
            'bank_holiday_end_year' => self::$bankHolidayEndYear,
            'federal_holiday_start_year' => self::$federalHolidayStartYear,
            'federal_holiday_end_year' => self::$federalHolidayEndYear,
        ];
    }
}

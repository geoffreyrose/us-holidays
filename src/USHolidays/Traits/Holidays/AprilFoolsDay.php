<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonImmutable;
use USHolidays\HolidayInterface;

class AprilFoolsDay implements HolidayInterface
{
    public static string $name = "April Fools' Day";

    public static array $searchNames = ["APRIL FOOL'S DAY", "APRIL FOOLS' DAY", 'APRIL FOOLS DAY', 'APRIL FOOLS'];

    public static bool $bankHoliday = false;

    public static bool $federalHoliday = false;

    public static int|null $startYear = 1582;

    public static int|null $endYear = null;

    public static int|null $bankHolidayStartYear = null;

    public static int|null $bankHolidayEndYear = null;

    public static int|null $federalHolidayStartYear = null;

    public static int|null $federalHolidayEndYear = null;

    /**
     * Setting April Fools' Day
     *
     * @param int $year The year to get the holiday in
     */
    public static function setHoliday(int $year)
    {
        return CarbonImmutable::create($year, 4, 1, 0, 0, 0);
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

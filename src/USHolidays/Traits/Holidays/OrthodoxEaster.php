<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait OrthodoxEaster
{
    /**
     * Setting Orthodox Easter
     *
     * @param  int  $year  The year to get the holiday in
     */
    private function setOrthodoxEaster(int $year)
    {
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        // Julian to Gregorian: the gap is 13 days only in 1900-2099
        // (12 days in 1800-1899, 14 days in 2100-2199, ...)
        $julianToGregorianDays = intdiv($year, 100) - intdiv($year, 400) - 2;

        $dt = mktime(0, 0, 0, $month, $day + $julianToGregorianDays, $year);

        return USHolidays::createFromTimestamp($dt)->setTime(0, 0, 0);
    }

    /**
     * Return object of Orthodox Easter for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     */
    public function getOrthodoxEasterHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Orthodox Easter', $year)[0];
    }
}

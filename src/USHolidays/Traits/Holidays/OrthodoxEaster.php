<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait OrthodoxEaster
{
    /**
     * Setting Orthodox Easter
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setOrthodoxEaster(int $year): USHolidays
    {
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = (int) floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        // Convert to timestamp and add 13 days (Julian to Gregorian diff)
        /** @var int $dt */
        $dt = mktime(0, 0, 0, $month, $day + 13, $year);

        return USHolidays::createFromTimestamp($dt)->setTime(0, 0, 0);
    }

    /**
     * Return object of Orthodox Easter for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getOrthodoxEasterHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Orthodox Easter', $year)[0];
    }
}

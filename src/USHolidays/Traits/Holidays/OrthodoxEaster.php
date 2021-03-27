<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait OrthodoxEaster
{
    /**
     * Setting Orthodox Easter
     *
     * @param int $year The year to get the holiday in
     */
    private function setOrthodoxEaster($year)
    {
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        $dt =  mktime(0, 0, 0, $month, $day + 13, $year);

        return Carbon::createFromTimestamp($dt)->setTime(0, 0, 0);
    }

    /**
     * Return object of Orthodox Easter for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getOrthodoxEasterHoliday($year = null)
    {
        return $this->getHolidaysByYear("Orthodox Easter", $year)[0];
    }
}

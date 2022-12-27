<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait ValentinesDay
{
    /**
     * Setting Valentines Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setValentinesDay(int $year)
    {
        return Carbon::create($year, 2, 14, 0, 0, 0);
    }

    /**
     * Return object of Valentines Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getValentinesDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Valentine's Day", $year)[0];
    }
}

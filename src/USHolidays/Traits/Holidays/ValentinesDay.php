<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait ValentinesDay
{
    /**
     * Setting Valentines Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setValentinesDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 2, 14, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Valentines Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getValentinesDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("Valentine's Day", $year)[0];
    }
}

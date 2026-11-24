<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait IndigenousPeoplesDay
{
    /**
     * Setting Indigenous Peoples Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setIndigenousPeoplesDay(int $year): USHolidays
    {
        return $this->setColumbusDay($year);
    }

    /**
     * Return object of Indigenous Peoples Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getIndigenousPeoplesDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("Indigenous Peoples' Day", $year)[0];
    }
}

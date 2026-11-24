<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait AshWednesday
{
    /**
     * Setting Ash Wednesday
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setAshWednesDay(int $year): USHolidays
    {
        return $this->setEaster($year)->subDays(46);
    }

    /**
     * Return object of Ash Wednesday for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getAshWednesdayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Ash Wednesday', $year)[0];
    }
}

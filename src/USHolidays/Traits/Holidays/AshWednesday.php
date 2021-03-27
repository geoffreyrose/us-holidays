<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait AshWednesday
{
    /**
     * Setting Ash Wednesday
     *
     * @param int $year The year to get the holiday in
     */
    private function setAshWednesday($year)
    {
        return $this->setEaster($year)->subDays(46);
    }

    /**
     * Return object of Ash Wednesday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getAshWednesdayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Ash Wednesday", $year)[0];
    }
}

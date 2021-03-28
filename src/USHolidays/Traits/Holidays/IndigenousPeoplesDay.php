<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait IndigenousPeoplesDay
{
    /**
     * Setting Indigenous Peoples Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setIndigenousPeoplesDay($year)
    {
        return $this->setColumbusDay($year, 0, 0, 0);
    }

    /**
     * Return object of Indigenous Peoples Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getIndigenousPeoplesDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Indigenous Peoples' Day", $year)[0];
    }
}

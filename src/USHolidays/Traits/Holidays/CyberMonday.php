<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait CyberMonday
{
    /**
     * Setting Cyber Monday
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setCyberMonDay(int $year): USHolidays
    {
        return $this->setThanksgiving($year)->addDays(4);
    }

    /**
     * Return object of Cyber Monday for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getCyberMondayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Cyber Monday', $year)[0];
    }
}

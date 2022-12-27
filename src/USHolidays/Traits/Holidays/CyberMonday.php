<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait CyberMonday
{
    /**
     * Setting Cyber Monday
     *
     * @param int $year The year to get the holiday in
     */
    private function setCyberMonday($year)
    {
        return $this->setThanksgiving($year)->addDays(4);
    }

    /**
     * Return object of Cyber Monday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getCyberMondayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Cyber Monday", $year)[0];
    }
}

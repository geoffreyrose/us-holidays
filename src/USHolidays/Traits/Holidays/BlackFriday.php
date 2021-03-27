<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait BlackFriday
{
    /**
     * Setting Black Friday
     *
     * @param int $year The year to get the holiday in
     */
    private function setBlackFriday($year)
    {
        return $this->setThanksgiving($year)->addDay();
    }

    /**
     * Return object of Black Friday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getBlackFridayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Black Friday", $year)[0];
    }
}

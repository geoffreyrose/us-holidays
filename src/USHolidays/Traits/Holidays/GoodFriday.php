<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait GoodFriday
{
    /**
     * Setting Good Friday
     *
     * @param int $year The year to get the holiday in
     */
    private function setGoodFriday($year)
    {
        return $this->setEaster($year)->subDays(2);
    }

    /**
     * Return object of Good Friday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getGoodFridayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Good Friday", $year)[0];
    }
}

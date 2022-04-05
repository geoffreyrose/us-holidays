<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait Easter
{
    /**
     * Setting Easter
     *
     * @param int $year The year to get the holiday in
     */
    private function setEaster($year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);

        return $date->addDays($days);
    }

    /**
     * Return object of Easter for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEasterHoliday($year = null)
    {
        return $this->getHolidaysByYear("Easter", $year)[0];
    }
}

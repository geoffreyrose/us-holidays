<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Easter
{
    /**
     * Setting Easter
     *
     * @param int $year The year to get the holiday in
     */
    private function setEaster(int $year)
    {
        $date = USHolidays::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);

        return $date->addDays($days);
    }

    /**
     * Return object of Easter for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEasterHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Easter', $year)[0];
    }
}

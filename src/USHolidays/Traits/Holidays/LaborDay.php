<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait LaborDay
{
    /**
     * Setting Labor Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setLaborDay(int $year)
    {
        $date = USHolidays::create($year, 9, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }

        return $date;
    }

    /**
     * Return object of Labor Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getLaborDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Labor Day', $year)[0];
    }
}

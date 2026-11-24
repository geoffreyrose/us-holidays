<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait LaborDay
{
    /**
     * Setting Labor Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setLaborDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 9, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }

        return $date;
    }

    /**
     * Return object of Labor Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getLaborDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Labor Day', $year)[0];
    }
}

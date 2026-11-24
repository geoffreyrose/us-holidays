<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait ColumbusDay
{
    /**
     * Setting Columbus Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setColumbusDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 10, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }
        $date->next(CarbonInterface::MONDAY);

        return $date;
    }

    /**
     * Return object of Columbus Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getColumbusDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Columbus Day', $year)[0];
    }
}

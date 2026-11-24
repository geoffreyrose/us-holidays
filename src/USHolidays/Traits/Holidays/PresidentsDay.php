<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait PresidentsDay
{
    /**
     * Setting Presidents Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setPresidentsDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 2, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }
        $date->next(CarbonInterface::MONDAY)->next(CarbonInterface::MONDAY);

        return $date;
    }

    /**
     * Return object of Presidents Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getPresidentsDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("Presidents' Day", $year)[0];
    }
}

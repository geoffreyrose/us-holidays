<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait DaylightSavingStart
{
    /**
     * Setting Daylight Saving (Start)
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setDaylightSavingStart(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 3, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }
        $date->next(CarbonInterface::SUNDAY);

        return $date;
    }

    /**
     * Return object of Daylight Saving (Start) for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getDaylightSavingStartHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Daylight Saving (Start)', $year)[0];
    }
}

<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait DaylightSavingEnd
{
    /**
     * Setting Daylight Saving (End)
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setDaylightSavingEnd(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 11, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }

        return $date;
    }

    /**
     * Return object of Daylight Saving (End) for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getDaylightSavingEndHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Daylight Saving (End)', $year)[0];
    }
}

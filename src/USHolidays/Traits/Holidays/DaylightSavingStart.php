<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait DaylightSavingStart
{
    /**
     * Setting Daylight Saving (Start)
     *
     * @param int $year The year to get the holiday in
     */
    private function setDaylightSavingStart(int $year)
    {
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
     * @param int|null $year The year to get the holiday in
     */
    public function getDaylightSavingStartHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Daylight Saving (Start)', $year)[0];
    }
}

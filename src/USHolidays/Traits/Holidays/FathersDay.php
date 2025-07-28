<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait FathersDay
{
    /**
     * Setting Fathers Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setFathersDay(int $year)
    {
        $date = USHolidays::create($year, 6, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }
        $date->next(CarbonInterface::SUNDAY)->next(CarbonInterface::SUNDAY);

        return $date;
    }

    /**
     * Return object of Father Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFathersDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear("Father's Day", $year)[0];
    }
}

<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait MothersDay
{
    /**
     * Setting Mothers Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMothersDay(int $year)
    {
        $date = USHolidays::create($year, 5, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }
        $date->next(CarbonInterface::SUNDAY);

        return $date;
    }

    /**
     * Return object of Mothers Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMothersDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear("Mother's Day", $year)[0];
    }
}

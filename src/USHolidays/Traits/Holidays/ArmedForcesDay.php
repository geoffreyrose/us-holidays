<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait ArmedForcesDay
{
    /**
     * Setting Armed Forces Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setArmedForcesDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 5, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SATURDAY) {
            $date->next(CarbonInterface::SATURDAY);
        }
        $date->next(CarbonInterface::SATURDAY)->next(CarbonInterface::SATURDAY);

        return $date;
    }

    /**
     * Return object of Armed Forces Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getArmedForcesDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Armed Forces Day', $year)[0];
    }
}

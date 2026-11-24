<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait MemorialDay
{
    /**
     * Setting Memorial Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setMemorialDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 5, 1, 0, 0, 0);
        for ($i = 0; $i < 7; $i++) {
            if ($date->month === 5) {
                $date->next(CarbonInterface::MONDAY);
            } else {
                $date->subDays(7);
                break;
            }
        }

        return $date;
    }

    /**
     * Return object of Memorial Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getMemorialDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Memorial Day', $year)[0];
    }
}

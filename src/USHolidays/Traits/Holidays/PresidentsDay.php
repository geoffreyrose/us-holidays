<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait PresidentsDay
{
    /**
     * Setting Presidents Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setPresidentsDay(int $year)
    {
        $date = Carbon::create($year, 2, 1, 0, 0, 0);
        if ($date->dayOfWeek !== Carbon::MONDAY) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        return $date;
    }

    /**
     * Return object of Presidents Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPresidentsDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Presidents' Day", $year)[0];
    }
}

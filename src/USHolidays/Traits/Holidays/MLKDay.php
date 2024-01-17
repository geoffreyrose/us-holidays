<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait MLKDay
{
    /**
     * Setting MLK Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMLKDay(int $year)
    {
        $date = Carbon::create($year, 1, 1, 0, 0, 0);
        if ($date->dayOfWeek !== Carbon::MONDAY) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        return $date;
    }

    /**
     * Return object of MLK Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMLKDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Martin Luther King Jr. Day', $year)[0];
    }
}

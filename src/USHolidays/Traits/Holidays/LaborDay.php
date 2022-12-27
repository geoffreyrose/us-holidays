<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait LaborDay
{
    /**
     * Setting Labor Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setLaborDay(int $year)
    {
        $date = Carbon::create($year, 9, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }

        return $date;
    }

    /**
     * Return object of Labor Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getLaborDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Labor Day", $year)[0];
    }
}

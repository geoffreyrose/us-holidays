<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait ColumbusDay
{
    /**
     * Setting Columbus Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setColumbusDay(int $year)
    {
        $date = Carbon::create($year, 10, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY);

        return $date;
    }

    /**
     * Return object of Columbus Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getColumbusDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Columbus Day", $year)[0];
    }
}

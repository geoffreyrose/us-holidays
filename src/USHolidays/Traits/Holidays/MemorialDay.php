<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait MemorialDay
{
    /**
     * Setting Memorial Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMemorialDay(int $year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        for ($i=0; $i < 7; $i++) {
            if( $date->month === 5 ) {
                $date->next(Carbon::MONDAY);
            }  else {
                $date->subDays(7);
                break;
            }
        }

        return $date;
    }

    /**
     * Return object of Memorial Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMemorialDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Memorial Day", $year)[0];
    }
}

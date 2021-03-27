<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait DaylightSavingEnd
{
    /**
     * Setting Daylight Saving (End)
     *
     * @param int $year The year to get the holiday in
     */
    private function setDaylightSavingEnd($year)
    {
        $date = Carbon::create($year, 11, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }

        return $date;
    }

    /**
     * Return object of Daylight Saving (End) for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getDaylightSavingEndHoliday($year = null)
    {
        return $this->getHolidaysByYear("Daylight Saving (End)", $year)[0];
    }
}

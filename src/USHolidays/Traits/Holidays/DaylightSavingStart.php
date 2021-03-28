<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait DaylightSavingStart
{
    /**
     * Setting Daylight Saving (Start)
     *
     * @param int $year The year to get the holiday in
     */
    private function setDaylightSavingStart($year)
    {
        $date = Carbon::create($year, 3, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY);

        return $date;
    }

    /**
     * Return object of Daylight Saving (Start) for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getDaylightSavingStartHoliday($year = null)
    {
        return $this->getHolidaysByYear("Daylight Saving (Start)", $year)[0];
    }

}

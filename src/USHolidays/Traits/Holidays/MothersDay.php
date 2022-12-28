<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait MothersDay
{
    /**
     * Setting Mothers Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMothersDay(int $year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY);

        return $date;
    }

    /**
     * Return object of Mothers Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMothersDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Mother's Day", $year)[0];
    }
}

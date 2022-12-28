<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait Thanksgiving
{
    /**
     * Setting Thanksgiving
     *
     * @param int $year The year to get the holiday in
     */
    private function setThanksgiving(int $year)
    {
        $date = Carbon::create($year, 11, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::THURSDAY ) {
            $date->next(Carbon::THURSDAY);
        }
        $date->next(Carbon::THURSDAY)->next(Carbon::THURSDAY)->next(Carbon::THURSDAY);

        return $date;
    }

    /**
     * Return object of Thanksgiving for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getThanksgivingHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Thanksgiving", $year)[0];
    }
}

<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait FathersDay
{
    /**
     * Setting Fathers Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setFathersDay(int $year)
    {
        $date = Carbon::create($year, 6, 1, 0, 0, 0);
        if ($date->dayOfWeek !== Carbon::SUNDAY) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY)->next(Carbon::SUNDAY);

        return $date;
    }

    /**
     * Return object of Father Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFathersDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Father's Day", $year)[0];
    }
}

<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait ArmedForcesDay
{
    /**
     * Setting Armed Forces Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setArmedForcesDay(int $year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        if ($date->dayOfWeek !== Carbon::SATURDAY) {
            $date->next(Carbon::SATURDAY);
        }
        $date->next(Carbon::SATURDAY)->next(Carbon::SATURDAY);

        return $date;
    }

    /**
     * Return object of Armed Forces Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getArmedForcesDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Armed Forces Day', $year)[0];
    }
}

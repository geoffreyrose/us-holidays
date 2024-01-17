<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait TaxDay
{
    /**
     * Setting Tax Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setTaxDay(int $year)
    {
        $date = Carbon::create($year, 04, 15, 0, 0, 0);
        if ($date->dayOfWeek === Carbon::SATURDAY || $date->dayOfWeek === Carbon::SUNDAY) {
            $date->next(Carbon::TUESDAY);
        } elseif ($date->dayOfWeek === Carbon::FRIDAY) {
            $date->next(Carbon::MONDAY);
        }

        return $date;
    }

    /**
     * Return object of Tax Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getTaxDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Tax Day', $year)[0];
    }
}

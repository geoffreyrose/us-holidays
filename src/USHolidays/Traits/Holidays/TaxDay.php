<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait TaxDay
{
    /**
     * Setting Tax Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setTaxDay(int $year)
    {
        $date = USHolidays::create($year, 04, 15, 0, 0, 0);
        if ($date->dayOfWeek === CarbonInterface::SATURDAY || $date->dayOfWeek === CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::TUESDAY);
        } elseif ($date->dayOfWeek === CarbonInterface::FRIDAY) {
            $date->next(CarbonInterface::MONDAY);
        }

        return $date;
    }

    /**
     * Return object of Tax Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getTaxDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Tax Day', $year)[0];
    }
}

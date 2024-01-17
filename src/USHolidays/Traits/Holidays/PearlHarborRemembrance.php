<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait PearlHarborRemembrance
{
    /**
     * Setting Pearl Harbor Remembrance
     *
     * @param int $year The year to get the holiday in
     */
    private function setPearlHarborRemembrance(int $year)
    {
        return Carbon::create($year, 12, 7, 0, 0, 0);
    }

    /**
     * Return object of Pearl Harbor Remembrance Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPearlHarborRemembranceDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Pearl Harbor Remembrance Day', $year)[0];
    }
}

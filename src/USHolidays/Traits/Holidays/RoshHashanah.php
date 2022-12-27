<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait RoshHashanah
{
    /**
     * Setting Rosh Hashanah
     *
     * @param int $year The year to get the holiday in
     */
    private function setRoshHashanah(int $year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 1, 3761 + $year)))->setTime(0, 0, 0);
    }

    /**
     * Return object of Rosh Hashanah for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getRoshHashanahHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("Rosh Hashanah", $year)[0];
    }
}

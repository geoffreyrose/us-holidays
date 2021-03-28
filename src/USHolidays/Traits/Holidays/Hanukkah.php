<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait Hanukkah
{
    /**
     * Setting Hanukkah
     *
     * @param int $year The year to get the holiday in
     */
    private function setHanukkah($year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(3, 25, 3761 + intval($year))))->setTime(0, 0, 0);
    }

    /**
     * Return object of Hanukkah for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getHanukkahHoliday($year = null)
    {
        return $this->getHolidaysByYear("Hanukkah", $year)[0];
    }
}

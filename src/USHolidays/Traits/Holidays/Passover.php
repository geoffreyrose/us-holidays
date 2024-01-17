<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait Passover
{
    /**
     * Setting Passover
     *
     * @param int $year The year to get the holiday in
     */
    private function setPassover(int $year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(8, 15, 3760 + $year)))->setTime(0, 0, 0);
    }

    /**
     * Return object of Passover for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPassoverHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Passover', $year)[0];
    }
}

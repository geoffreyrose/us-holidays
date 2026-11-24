<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Passover
{
    /**
     * Setting Passover
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setPassover(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(8, 15, 3760 + $year)));
        $date->setTime(0, 0, 0);
        return $date;
    }

    /**
     * Return object of Passover for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getPassoverHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Passover', $year)[0];
    }
}

<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait RoshHashanah
{
    /**
     * Setting Rosh Hashanah
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setRoshHashanah(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 1, 3761 + $year)));
        $date->setTime(0, 0, 0);
        return $date;
    }

    /**
     * Return object of Rosh Hashanah for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getRoshHashanahHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Rosh Hashanah', $year)[0];
    }
}

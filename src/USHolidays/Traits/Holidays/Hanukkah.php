<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Hanukkah
{
    /**
     * Setting Hanukkah
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setHanukkah(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(3, 25, 3761 + $year)));
        $date->setTime(0, 0, 0);
        return $date;
    }

    /**
     * Return object of Hanukkah for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getHanukkahHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Hanukkah', $year)[0];
    }
}

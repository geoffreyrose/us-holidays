<?php

namespace USHolidays\Traits\Holidays;

use Carbon\CarbonInterface;
use USHolidays\USHolidays;

trait Thanksgiving
{
    /**
     * Setting Thanksgiving
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setThanksgiving(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 11, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::THURSDAY) {
            $date->next(CarbonInterface::THURSDAY);
        }
        $date->next(CarbonInterface::THURSDAY)->next(CarbonInterface::THURSDAY)->next(CarbonInterface::THURSDAY);

        return $date;
    }

    /**
     * Return object of Thanksgiving for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getThanksgivingHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Thanksgiving', $year)[0];
    }
}

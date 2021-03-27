<?php

namespace USHolidays\Traits;

use USHolidays\Carbon;

trait BusinessDays
{
    /**
     * Check if using standard business days
     */
    private function isStandardBusinessDays()
    {
        if($this->businessDays != [1,2,3,4,5]) {
            return false;
        }

        return true;
    }

    /**
     * Set Business Holidays
     *
     * @param array $holidays An array holiday names to be bank holidays
     */
    public function setBankHolidays($holidays)
    {
        foreach ($holidays as $key => $holiday) {
            $holidays[$key] = strtoupper($holiday);
        }

        return $this->bankHolidayArray = $holidays;
    }

    /**
     * Set Business Days
     *
     * @param array $days An array of Carbon dayOfWeek int's
     */
    public function setBusinessDays($days)
    {
        return $this->businessDays = $days;
    }

    /**
     * Check if date is a business day
     * Returns boolean
     */
    public function isBusinessDay()
    {
        return in_array($this->dayOfWeek, $this->businessDays);
    }

    /**
     * Next business day
     * Returns Carbon date object
     */
    public function nextBusinessDay()
    {
        $day = $this->copy();

        for ($i=0; $i < 14 ; $i++) {
            if($this->isStandardBusinessDays()) {
                if($day->addDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if($day->addDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }

    /**
     * Previous business day
     * Returns Carbon date object
     */
    public function prevBusinessDay()
    {
        $day = $this->copy();

        for ($i=0; $i < 14 ; $i++) {
            if($this->isStandardBusinessDays()) {
                if($day->subDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if($day->subDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }

    /**
     * Today (if business day) or next business day.
     * Returns Carbon date object
     */
    public function currentOrNextBusinessDay()
    {
        $day = $this->copy()->subDay();

        for ($i=0; $i < 14 ; $i++) {
            if($this->isStandardBusinessDays()) {
                if($day->addDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if($day->addDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }

    /**
     * Today (if business day) or previous business day
     * Returns Carbon date object
     */
    public function currentOrPreviousBusinessDay()
    {
        $day = $this->copy()->addDay();

        for ($i=0; $i < 14 ; $i++) {
            if($this->isStandardBusinessDays()) {
                if($day->subDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if($day->subDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }
}

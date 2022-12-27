<?php

namespace USHolidays\Traits;

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
     * Set Business Days
     *
     * @param int[] $days An array of Carbon dayOfWeek int's
     * @return int[] The set business days
     */
    public function setBusinessDays($days)
    {
        return $this->businessDays = $days;
    }

    /**
     * Check if date is a business day
     *
     * @return bool
     */
    public function isBusinessDay()
    {
        return in_array($this->dayOfWeek, $this->businessDays);
    }

    /**
     * Next business day
     *
     * @return Object Carbon Date object
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
     *
     * @return Object Carbon Date object
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
     *
     * @return Object Carbon Date object
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
     *
     * @return Object Carbon Date object
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

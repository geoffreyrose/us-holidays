<?php

namespace USHolidays\Traits;

use USHolidays\USHolidays;

trait BusinessDays
{
    /**
     * Check if using standard business days
     */
    private function isStandardBusinessDays(): bool
    {
        if ($this->businessDays != [1, 2, 3, 4, 5]) {
            return false;
        }

        return true;
    }

    /**
     * Set Business Days
     *
     * @param int[] $days  An array of Carbon dayOfWeek int's
     * @return int[] The set business days
     */
    public function setBusinessDays(array $days): array
    {
        return $this->businessDays = $days;
    }

    /**
     * Check if date is a business day
     *
     * @return bool
     */
    public function isBusinessDay(): bool
    {
        return in_array($this->dayOfWeek, $this->businessDays);
    }

    /**
     * Next business day
     *
     * @return USHolidays Carbon Date object
     */
    public function nextBusinessDay(): USHolidays
    {
        $day = $this->copy();

        for ($i = 0; $i < 14; $i++) {
            if ($this->isStandardBusinessDays()) {
                if ($day->addDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if ($day->addDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }

    /**
     * Previous business day
     *
     * @return USHolidays Carbon Date object
     */
    public function prevBusinessDay(): USHolidays
    {
        $day = $this->copy();

        for ($i = 0; $i < 14; $i++) {
            if ($this->isStandardBusinessDays()) {
                if ($day->subDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if ($day->subDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }

    /**
     * Today (if business day) or next business day.
     *
     * @return USHolidays Carbon Date object
     */
    public function currentOrNextBusinessDay(): USHolidays
    {
        $day = $this->copy()->subDay();

        for ($i = 0; $i < 14; $i++) {
            if ($this->isStandardBusinessDays()) {
                if ($day->addDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if ($day->addDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }

    /**
     * Today (if business day) or previous business day
     *
     * @return USHolidays Carbon Date object
     */
    public function currentOrPreviousBusinessDay(): USHolidays
    {
        $day = $this->copy()->addDay();

        for ($i = 0; $i < 14; $i++) {
            if ($this->isStandardBusinessDays()) {
                if ($day->subDay()->isBusinessDay() && !$day->isBankHoliday()) {
                    break;
                }
            } else {
                if ($day->subDay()->isBusinessDay()) {
                    break;
                }
            }
        }

        return $day;
    }
}

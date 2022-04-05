<?php
/**
 * US Holidays Wrapper for the Carbon DateTime Library
 */

namespace USHolidays;

use USHolidays\Traits\Holiday;
use USHolidays\Traits\BusinessDays;
use Exception;

/**
 * This extends Carbon and adds support for 41 US holidays.
 */
class Carbon extends \Carbon\Carbon {

    use Holiday;
    use BusinessDays;

    /**
     * An array of all the names of the holidays
     */
    private $holidayArray = ["April Fools' Day","Armed Forces Day","Ash Wednesday","Black Friday","Christmas Day","Christmas Eve","Cinco de Mayo","Columbus Day","Daylight Saving (End)","Daylight Saving (Start)","Earth Day","Easter","Father's Day","Flag Day","Good Friday","Groundhog Day","Halloween","Hanukkah","Independence Day","Indigenous Peoples' Day","Juneteenth","Kwanzaa","Labor Day","Memorial Day","Martin Luther King Jr. Day","Mother's Day","New Year's Day","New Year's Eve","Orthodox Easter","Palm Sunday","Passover","Patriot Day","Pearl Harbor Remembrance Day","Presidents' Day","Rosh Hashanah","St. Patrick's Day","Tax Day","Thanksgiving","Valentine's Day","Veterans Day","Yom Kippur"];

    /**
     * An array of bank holidays
     */
    private $bankHolidayArray = ['default'];

    /**
     * An array of business days
     */
    private $businessDays = [1,2,3,4,5];

    /**
     * An array of all the user added holidays
     */
    private $userAddedHolidays = array();

    /**
     * An array of all holidays to use
     */
    public function setHolidays($holidays)
    {
        foreach ($holidays as $key => $holiday) {
            $holidays[$key] = strtoupper($holiday);
        }

        $this->holidayArray = $holidays;
    }

    /**
     * Add a user defined holiday
     *
     * @param array $data The year to get the holidays in
     * @return true;
     */
    public function addHoliday($data): bool
    {
        $this->userAddedHolidays[] = $data;
        $this->holidayArray[] = $data['name'];

        return true;
    }

    /**
     * Compare to dates to sort
     *
     * @param object $a A date object
     * @param object $b A date object
     */
    private function compareDate($a, $b)
    {
        return $a->date <=> $b->date;
    }

    /**
     *  Returns holidays in the specified years
     *
     * @param string|array $name The name(s) of the holidays to get
     * @param int|null $year The year to get the holidays in
     */
    public function getHolidaysByYear($name, $year=null): array
    {
        // this is primarily for isBankHoliday() can get a list of holidays without a loop
        $bankHolidayCheck = true;
        if($name == 'no-bank-check') {
            $bankHolidayCheck = false;
            $name = 'all';
        }

        if($name == 'all' || $name == null) $name = $this->holidayArray;

        $year = $year ?: $this->year;

        $holidays = $this->holidays($year);
        $holidaySearchNames = array_column($holidays, 'search_names');
        $holiday_details = array();

        if(is_string($name)) {

            $index = false;
            foreach ($holidaySearchNames as $key => $holidaySearchName) {
                if (array_search(strtoupper($name), $holidaySearchName) !== false) {
                    $index = $key;
                }
            }

            if($index >= 0) {

                $currentYear = $this->copy()->year;
                $this->year = $year;
                $date = call_user_func($holidays[$index]['date']);
                $this->year = $currentYear;

                $days_until = $this->diffInDays($date);

                $bankHoliday = $holidays[$index]['bank_holiday'];
                // if($bankHoliday && $bankHolidayCheck) {
                //    $date->isBankHoliday();
                // }

                $federalHoliday = $holidays[$index]['federal_holiday'];
                // if($federalHoliday && $bankHolidayCheck) {
                //    $date->isFederalHoliday();
                // }

                $details = (object) [
                    'name' => $holidays[$index]['name'],
                    'date' => $date,
                    'bank_holiday' => $bankHoliday,
                    'federal_holiday' => $federalHoliday,
                    'days_away' => $days_until,
                    'start_year' => $holidays[$index]['start_year'],
                    'end_year' => $holidays[$index]['end_year'],
                    'bank_holiday_start_year' => $holidays[$index]['bank_holiday_start_year'],
                    'bank_holiday_end_year' => $holidays[$index]['bank_holiday_end_year'],
                    'federal_holiday_start_year' => $holidays[$index]['federal_holiday_start_year'],
                    'federal_holiday_end_year' => $holidays[$index]['federal_holiday_end_year'],
                ];

                if($holidays[$index]['start_year'] <= $year) {
                    $holiday_details[] = $details;
                }
            }

        } elseif (is_array($name)) {


            foreach ($name as $search_name) {

                foreach ($holidaySearchNames as $key => $holidaySearchName) {
                    if( array_search(strtoupper($search_name), $holidaySearchName ) !== false ) {
                        $index = $key;

                        if($index >= 0) {

                            $currentYear = $this->copy()->year;
                            $this->year = $year;
                            $date = call_user_func($holidays[$index]['date']);
                            $this->year = $currentYear;

                            $days_until =  $this->diffInDays($date);

                            $bankHoliday = $holidays[$index]['bank_holiday'];

                            // if($bankHoliday && $bankHolidayCheck) {
                            // $date->isBankHoliday();
                            // }

                            $federalHoliday = $holidays[$index]['federal_holiday'];
                            // if($federalHoliday && $bankHolidayCheck) {
                            //    $date->isFederalHoliday();
                            // }

                            $details = (object) [
                                'name' => $holidays[$index]['name'],
                                'date' => $date,
                                'bank_holiday' => $bankHoliday,
                                'federal_holiday' => $federalHoliday,
                                'days_away' => $days_until,
                                'start_year' => $holidays[$index]['start_year'],
                                'end_year' => $holidays[$index]['end_year'],
                                'bank_holiday_start_year' => $holidays[$index]['bank_holiday_start_year'],
                                'bank_holiday_end_year' => $holidays[$index]['bank_holiday_end_year'],
                                'federal_holiday_start_year' => $holidays[$index]['federal_holiday_start_year'],
                                'federal_holiday_end_year' => $holidays[$index]['federal_holiday_end_year'],
                            ];

                            if($holidays[$index]['start_year'] <= $year) {
                                $holiday_details[] = $details;
                            }
                        }
                    }
                }
            }
        }

        usort($holiday_details, array($this, "compareDate"));

        return $holiday_details;
    }

    /**
     * Returns holidays in the next amount of days
     *
     * @param int $days The number of days to look ahead to find holidays in
     * @param string|array|null $holidays The name(s) of the holidays to get
     */
    public function getHolidaysInDays($days, $holidays=null)
    {
        $this->setTime(0,0,0);
        if($holidays === null || $holidays === 'all') {
            $holidays = $this->holidayArray;
        }



        if($days > 0) {
            $searchStartDate = $this->copy();
            $searchEndDate = $this->copy()->addDays($days)->year;
        } else {
            $days = $days * -1;

            $searchEndDate = $this->copy()->year;
            $searchStartDate = $this->copy()->subDays($days);

        }


        $holidaysInRange = array();
        for ($i=$searchStartDate->year; $i <= $searchEndDate; $i++) {
            $holidayYear = $this->getHolidaysByYear($holidays, $i);

            foreach ($holidayYear as $holiday) {
                if( $holiday->date->lessThanOrEqualTo($searchStartDate->copy()->addDays($days)) && $holiday->date->greaterThanOrEqualTo($searchStartDate) ) {
                    $holidaysInRange[] = $holiday;
                }
            }
        }


        return $holidaysInRange;
    }

    /**
     * Returns holidays in the next amount of years
     *
     * @param int $years The number of years to look ahead to find holidays in
     * @param string|array|null $holidays The name(s) of the holidays to get
     */
    public function getHolidaysInYears($years, $holidays=null)
    {
        if($years > 0) {
            $days = $this->diffInDays($this->copy()->addYears($years));
        } else {
            $days = $this->diffInDays($this->copy()->subYears($years)) * -1;
        }

        return $this->getHolidaysInDays($days, $holidays);
    }

    /**
     * Check if a date is a holiday. returns boolean
     *
     * @return bool
     */
    public function isHoliday()
    {
        $holidays = $this->getHolidaysByYear('all');

        $isHoliday = false;

        foreach ($holidays as $holiday) {
            $theHolidayStartYear = $holiday->start_year ?: $this->year;
            $theHolidayendYear = $holiday->end_year ?: $this->year;

            if( $this->isBirthday($holiday->date) && $theHolidayStartYear <= $this->year && $theHolidayendYear >= $this->year ) {
                $isHoliday = true;
                break;
            }
        }

        return $isHoliday;
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
     * Check if a date is a bank holiday. returns boolean
     *
     * @return bool
     */
    public function isBankHoliday(): bool
    {
        if(!$this->isStandardBusinessDays()) {
            throw new Exception("Cannot use isBankHoliday() with non-standard businessDays");
        }

        $holidays = $this->getHolidaysByYear('no-bank-check');
        $isBankHoliday = false;

        foreach ($holidays as $holiday) {
            $bankHolidayStartYear = $holiday->bank_holiday_start_year ?: $this->year;
            $bankHolidayendYear = $holiday->bank_holiday_end_year ?: $this->year;

            if( $holiday->bank_holiday && $bankHolidayStartYear <= $this->year && $bankHolidayendYear >= $this->year ) {
                if($this->isBirthday($holiday->date) && $this->isBusinessDay() ) {
                    $isBankHoliday = true;
                    break;
                } else {
                    if($this->dayOfWeek === Carbon::MONDAY ) {
                        if( $this->copy()->subDay()->isBirthday($holiday->date) ) {
                            $isBankHoliday = true;
                            break;
                        }
                    }
                }
            }
        }

        return $isBankHoliday;
    }

    /**
     * Check if a date is a federal holiday. returns boolean
     *
     * @return bool
     */
    public function isFederalHoliday(): bool
    {
        if(!$this->isStandardBusinessDays()) {
            throw new Exception("Cannot use isFederalHoliday() with non-standard businessDays");
        }

        $holidays = $this->getHolidaysByYear('no-bank-check');
        $isFederalHoliday = false;

        foreach ( $holidays as $holiday) {
            $federalHolidayStartYear = $holiday->federal_holiday_start_year ?: $this->year;
            $federalHolidayendYear = $holiday->federal_holiday_end_year ?: $this->year;

            if( $holiday->federal_holiday && $federalHolidayStartYear <= $this->year && $federalHolidayendYear >= $this->year ) {
                if( $this->isBirthday($holiday->date) && $this->isBusinessDay() ) {
                    $isFederalHoliday = true;
                    break;
                } else {
                    if( $this->dayOfWeek === Carbon::MONDAY ) {
                        if( $this->copy()->subDay()->isBirthday($holiday->date) ) {
                            $isFederalHoliday = true;
                            break;
                        }
                    } else if( $this->dayOfWeek === Carbon::FRIDAY ) {
                        if( $this->copy()->addDay()->isBirthday($holiday->date) ) {
                            $isFederalHoliday = true;
                            break;
                        }
                    }
                }
            }
        }

        return $isFederalHoliday;
    }

    /**
     * Get the holiday names, if any for the given date
     *
     * @return string|null
     */
    public function getHolidayName(): string
    {
        $holidays = $this->getHolidaysByYear('all');
        $holidayName = null;

        foreach ($holidays as $holiday) {
            if( $this->isBirthday($holiday->date) ) {
                $holidayName .= $holiday->name . ', ';
            } else {
                if( $this->dayOfWeek === Carbon::MONDAY ) {
                    if( $this->copy()->subDay()->isBirthday($holiday->date) && $holiday->bank_holiday ) {
                        $holidayName .= $holiday->name . ' (Observed), ';
                    }
                } else if( $this->dayOfWeek === Carbon::FRIDAY ) {
                    if( $this->copy()->addDay()->isBirthday($holiday->date) && $holiday->bank_holiday ) {
                        $holidayName .= $holiday->name . ' (Observed), ';
                    }
                }
            }
        }

        if( $holidayName ) {
            $holidayName = rtrim($holidayName, ', ');
        }

        return $holidayName;
    }

    /**
     * Return next holiday(s)
     *
     * @param int|null $number the number of holidays to get. default is 1
     */
    public function getNextHolidays($number=1): array
    {
        $number_of_years = ceil($number / count($this->holidayArray));

        $holidays = $this->getHolidaysInYears($number_of_years);

        return array_slice($holidays, 0, $number);
    }

    /**
     * Return previous holiday(s)
     *
     * @param int|null $number the number of holidays to get. default is 1
     */
    public function getPrevHolidays($number=1): array
    {
        $number_of_years = ceil($number / count($this->holidayArray)) * -1;

        $holidays = $this->getHolidaysInYears($number_of_years);
        $count = count($holidays);

        return array_reverse(array_slice($holidays, $count - $number, $count));
    }

    /**
     * Return next holiday name
     *
     * @return string
     */
    public function getNextHolidayName(): string
    {
        return $this->getNextHolidays()[0]->name;
    }

    /**
     * Return next holiday days away
     *
     * @return int
     */
    public function getNextHolidayDays(): int
    {
        return $this->getNextHolidays()[0]->days_away;
    }

    /**
     * Return next holiday name
     *
     * @return string
     */
    public function getPrevHolidayName(): string
    {
        return $this->getPrevHolidays()[0]->name;
    }

    /**
     * Return next holiday days away
     *
     * @return int
     */
    public function getPrevHolidayDays(): int
    {
        return $this->getPrevHolidays()[0]->days_away;
    }
}

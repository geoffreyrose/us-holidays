<?php namespace USHolidays;

class Carbon extends \Carbon\Carbon {

    private function getHolidays( $year = null ) {
        if( $year === null) {
            $year = date('Y');
        }

        // Martin Luther King Jr. Day
        $martinLuther = Carbon::create($year, 1, 1);
        if( $martinLuther->dayOfWeek !== Carbon::MONDAY ) {
        	$martinLuther->next(Carbon::MONDAY);
        }
        $martinLuther->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        // Presidents' Day
        $presidents = Carbon::create($year, 2, 1);
        if( $presidents->dayOfWeek !== Carbon::MONDAY ) {
        	$presidents->next(Carbon::MONDAY);
        }
        $presidents->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        // Memorial Day
        $memorial = Carbon::create($year, 5, 1);
        for ($i=0; $i < 7; $i++) {
        	if( $memorial->month == 5 ) {
        		$memorial->next(Carbon::MONDAY);
        	}  else {
        		$memorial->subDays(7);
        		break;
        	}
        }

        // Labor Day
        $labor = Carbon::create($year, 9, 1);
        if( $labor->dayOfWeek !== Carbon::MONDAY ) {
        	$labor->next(Carbon::MONDAY);
        }

        // Columbus Day
        $columbus = Carbon::create($year, 10, 1);
        if( $columbus->dayOfWeek !== Carbon::MONDAY ) {
        	$columbus->next(Carbon::MONDAY);
        }
        $columbus->next(Carbon::MONDAY);


        // Thanksgiving
        $thanksgiving = Carbon::create($year, 11, 1);
        if( $thanksgiving->dayOfWeek !== Carbon::THURSDAY ) {
        	$thanksgiving->next(Carbon::THURSDAY);
        }
        $thanksgiving->next(Carbon::THURSDAY)->next(Carbon::THURSDAY)->next(Carbon::THURSDAY);


        $holidays = array(
        	array(
                'name' => "New Year's Day",
                'date' => Carbon::create($year, 01, 01),
                'bank_holiday' => true,
                'id' => 1
            ),
        	array(
                'name' => "Martin Luther King Jr. Day",
                'date' => $martinLuther,
                'bank_holiday' => true,
                'id' => 2
            ),
        	array(
                'name' => "Presidents' Day",
                'date' => $presidents,
                'bank_holiday' => true,
                'id' => 3
            ),
        	array(
                'name' => "Memorial Day",
                'date' => $memorial,
                'bank_holiday' => true,
                'id' => 4
            ),
            array(
                'name' => "Independence Day",
                'date' => Carbon::create($year, 07, 04),
                'bank_holiday' => true,
                'id' => 5
            ),
            array(
                'name' => "Labor Day",
                'date' => $labor,
                'bank_holiday' => true,
                'id' => 6
            ),
        	array(
                'name' => "Columbus Day",
                'date' => $columbus,
                'bank_holiday' => true,
                'id' => 7
            ),
        	array(
                'name' => "Veterans Day",
                'date' => Carbon::create($year, 11, 11),
                'bank_holiday' => true,
                'id' => 8
            ),
            array(
                'name' => "Thanksgiving",
                'date' => $thanksgiving,
                'bank_holiday' => true,
                'id' => 9
            ),
            array(
                'name' => "Christmas Eve",
                'date' => Carbon::create($year, 12, 24),
                'bank_holiday' => false,
                'id' => 10
            ),
        	array(
                'name' => "Christmas Day",
                'date' => Carbon::create($year, 12, 25),
                'bank_holiday' => true,
                'id' => 11
            ),
            array(
                'name' => "New Year's Eve",
                'date' => Carbon::create($year, 12, 31),
                'bank_holiday' => false,
                'id' => 12
            ),
        );


        return $holidays;
    }

    public function isHoliday($year = null)
	{
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $isHoliday = false;

        foreach ($holidays as $holiday) {
            if( $this->isBirthday($holiday['date']) ) {
                $isHoliday = true;
            }
        }

        return $isHoliday;
    }

    public function isBankHoliday($year = null)
	{
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $isBankHoliday = false;

        foreach ($holidays as $holiday) {
            if( $this->isBirthday($holiday['date']) && $holiday['bank_holiday'] ) {
                $isBankHoliday = true;
            }
        }

        return $isBankHoliday;
    }

    public function getHolidayName($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $holidayName = false;

        foreach ($holidays as $holiday) {
            if( $this->isBirthday($holiday['date']) ) {
                $holidayName = $holiday['name'];
            }
        }

        return $holidayName;
    }


    public function getNewYearsDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 1 ) {
                $date = $holiday['date'];

            }
        }

        $this->modify($date);
        return $date;
    }

    public function getMLKDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 2 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getPresidentsDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 3 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getMemorialDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 4 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getIndependenceDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 5 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getLaborDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 6 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getColumbusDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 7 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }



    public function getVeteransDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 8 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getThanksgivingHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 9 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getChristmasEveHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 10 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getChristmasDayHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 11 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

    public function getNewYearsEveHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $date = false;

        foreach ($holidays as $holiday) {
            if( $holiday['id'] === 12 ) {
                $date = $holiday['date'] ;
            }
        }

        $this->modify($date);
        return $date;
    }

}

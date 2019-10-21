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

        // Tax Day
        $taxDay = Carbon::create($year, 04, 15);
        if( $taxDay->dayOfWeek === Carbon::SATURDAY || $taxDay->dayOfWeek === Carbon::SUNDAY ) {
        	$taxDay->next(Carbon::TUESDAY);
        } else if( $taxDay->dayOfWeek === Carbon::FRIDAY) {
        	$taxDay->next(Carbon::MONDAY);
        }

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


        // Daylight Saving (Start)
        $daylightStart = Carbon::create($year, 3, 1);
        if( $daylightStart->dayOfWeek !== Carbon::SUNDAY ) {
        	$daylightStart->next(Carbon::SUNDAY);
        }
        $daylightStart->next(Carbon::SUNDAY);

        // Mothers Day
        $mothers = Carbon::create($year, 5, 1);
        if( $mothers->dayOfWeek !== Carbon::SUNDAY ) {
        	$mothers->next(Carbon::SUNDAY);
        }
        $mothers->next(Carbon::SUNDAY);

        // Armed Forces Day
        $armed = Carbon::create($year, 5, 1);
        if( $armed->dayOfWeek !== Carbon::SATURDAY ) {
            $armed->next(Carbon::SATURDAY);
        }
        $armed->next(Carbon::SATURDAY)->next(Carbon::SATURDAY);

        // Father Day
        $father = Carbon::create($year, 6, 1);
        if( $father->dayOfWeek !== Carbon::SUNDAY ) {
        	$father->next(Carbon::SUNDAY);
        }
        $father->next(Carbon::SUNDAY)->next(Carbon::SUNDAY);

        // Daylight Saving (End)
        $daylightEnd = Carbon::create($year, 11, 1);
        if( $daylightEnd->dayOfWeek !== Carbon::SUNDAY ) {
        	$daylightEnd->next(Carbon::SUNDAY);
        }


        $holidays = array(
        	array(
                'name' => "New Year's Day",
                'date' => Carbon::create($year, 1, 1),
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
                'name' => "Groundhog Day",
                'date' => Carbon::create($year, 2, 2),
                'bank_holiday' => false,
                'id' => 3
            ),
            array(
                'name' => "Valentine's Day",
                'date' => Carbon::create($year, 2, 14),
                'bank_holiday' => false,
                'id' => 4
            ),
        	array(
                'name' => "Presidents' Day",
                'date' => $presidents,
                'bank_holiday' => true,
                'id' => 5
            ),
            array(
                'name' => "Daylight Saving (Start)",
                'date' => $daylightStart,
                'bank_holiday' => false,
                'id' => 6
            ),
            array(
                'name' => "St. Patrick's Day",
                'date' => Carbon::create($year, 3, 17),
                'bank_holiday' => false,
                'id' => 7
            ),
            array(
                'name' => "April Fool's Day",
                'date' => Carbon::create($year, 4, 1),
                'bank_holiday' => false,
                'id' => 8
            ),
            array(
                'name' => "Mother's Day",
                'date' => $mothers,
                'bank_holiday' => false,
                'id' => 9
            ),
        	array(
                'name' => "Memorial Day",
                'date' => $memorial,
                'bank_holiday' => true,
                'id' => 10
            ),
            array(
                'name' => "Armed Forces Day",
                'date' => $armed,
                'bank_holiday' => false,
                'id' => 11
            ),
            array(
                'name' => "Father's Day",
                'date' => $father,
                'bank_holiday' => false,
                'id' => 12
            ),
            array(
                'name' => "Flag Day",
                'date' => Carbon::create($year, 6, 14),
                'bank_holiday' => false,
                'id' => 13
            ),
            array(
                'name' => "Independence Day",
                'date' => Carbon::create($year, 7, 4),
                'bank_holiday' => true,
                'id' => 14
            ),
            array(
                'name' => "Labor Day",
                'date' => $labor,
                'bank_holiday' => true,
                'id' => 15
            ),
            array(
                'name' => "Patriot Day",
                'date' => Carbon::create($year, 9, 11),
                'bank_holiday' => false,
                'id' => 16
            ),
        	array(
                'name' => "Columbus Day",
                'date' => $columbus,
                'bank_holiday' => true,
                'id' => 17
            ),
        	array(
                'name' => "Halloween",
                'date' => Carbon::create($year, 10, 31),
                'bank_holiday' => false,
                'id' => 18
            ),
            array(
                'name' => "Daylight Saving (End) ",
                'date' => $daylightEnd,
                'bank_holiday' => false,
                'id' => 19
            ),
            array(
                'name' => "Veterans Day",
                'date' => Carbon::create($year, 11, 11),
                'bank_holiday' => true,
                'id' => 20
            ),
            array(
                'name' => "Thanksgiving",
                'date' => $thanksgiving,
                'bank_holiday' => true,
                'id' => 21
            ),
            array(
                'name' => "Pearl Harbor Remembrance Day",
                'date' => Carbon::create($year, 12, 7),
                'bank_holiday' => false,
                'id' => 22
            ),
            array(
                'name' => "Christmas Eve",
                'date' => Carbon::create($year, 12, 24),
                'bank_holiday' => false,
                'id' => 23
            ),
        	array(
                'name' => "Christmas Day",
                'date' => Carbon::create($year, 12, 25),
                'bank_holiday' => true,
                'id' => 24
            ),
            array(
                'name' => "New Year's Eve",
                'date' => Carbon::create($year, 12, 31),
                'bank_holiday' => false,
                'id' => 25
            ),
            array(
                'name' => "Kwanzaa",
                'date' => Carbon::create($year, 12, 26),
                'bank_holiday' => false,
                'id' => 26
            ),
            array(
                'name' => "Earth Day",
                'date' => Carbon::create($year, 4, 22),
                'bank_holiday' => false,
                'id' => 27
            ),
            array(
                'name' => "Cinco de Mayo",
                'date' => Carbon::create($year, 5, 5),
                'bank_holiday' => false,
                'id' => 28
            ),
            array(
                'name' => "Juneteenth",
                'date' => Carbon::create($year, 6, 19),
                'bank_holiday' => false,
                'id' => 29
            ),
            array(
                'name' => "Indigenous Peoples' Day",
                'date' => $columbus,
                'bank_holiday' => true,
                'id' => 30
            ),
            array(
                'name' => "Tax Day",
                'date' => $taxDay,
                'bank_holiday' => false,
                'id' => 31
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
                if($this->dayOfWeek !== Carbon::SUNDAY && $this->dayOfWeek !== Carbon::SATURDAY) {
                    $isBankHoliday = true;
                }

            } else {
                if( $this->dayOfWeek === Carbon::MONDAY ) {
                    $this->subDay();

                    if( $this->isBirthday($holiday['date']) && $holiday['bank_holiday'] ) {
                        $isBankHoliday = true;
                    } else {
                        $this->addDay();
                    }
                } else if( $this->dayOfWeek === Carbon::FRIDAY ) {
                    $this->addDay();

                    if( $this->isBirthday($holiday['date']) && $holiday['bank_holiday'] ) {
                        $isBankHoliday = true;
                    } else {
                        $this->subDay();
                    }
                }
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
            } else {
                if( $this->dayOfWeek === Carbon::MONDAY ) {
                    $this->subDay();

                    if( $this->isBirthday($holiday['date']) && $holiday['bank_holiday'] ) {
                        $holidayName = $holiday['name'] . ' (Observed)';
                    } else {
                        $this->addDay();
                    }
                } else if( $this->dayOfWeek === Carbon::FRIDAY ) {
                    $this->addDay();

                    if( $this->isBirthday($holiday['date']) && $holiday['bank_holiday'] ) {
                        $holidayName = $holiday['name'] . ' (Observed)';
                    } else {
                        $this->subDay();
                    }
                }
            }
        }

        return $holidayName;
    }


    private function getHoldiayById($id, $year)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);

        $index = array_search($id, array_column($holidays, 'id') );
        $date = $holidays[$index]['date'];

        $this->modify($date);

        return $date;
    }

    public function getNewYearsDayHoliday($year = null)
    {
        return $this->getHoldiayById(1, $year);
    }

    public function getMLKDayHoliday($year = null)
    {
        return $this->getHoldiayById(2, $year);
    }

    public function getGroundhogDayHoliday($year = null)
    {
        return $this->getHoldiayById(3, $year);
    }

    public function getValentinesDayHoliday($year = null)
    {
        return $this->getHoldiayById(4, $year);
    }

    public function getPresidentsDayHoliday($year = null)
    {
        return $this->getHoldiayById(5, $year);
    }

    public function getDaylightSavingStartHoliday($year = null)
    {
        return $this->getHoldiayById(6, $year);
    }

    public function getStPatricksDayHoliday($year = null)
    {
        return $this->getHoldiayById(7, $year);
    }

    public function getAprilFoolsDayHoliday($year = null)
    {
        return $this->getHoldiayById(8, $year);
    }

    public function getMothersDayHoliday($year = null)
    {
        return $this->getHoldiayById(9, $year);
    }

    public function getMemorialDayHoliday($year = null)
    {
        return $this->getHoldiayById(10, $year);
    }

    public function getArmedForcesDayHoliday($year = null)
    {
        return $this->getHoldiayById(11, $year);
    }

    public function getFathersDayHoliday($year = null)
    {
        return $this->getHoldiayById(12, $year);
    }

    public function getFlagsDayHoliday($year = null)
    {
        return $this->getHoldiayById(13, $year);
    }

    public function getIndependenceDayHoliday($year = null)
    {
        return $this->getHoldiayById(14, $year);
    }

    public function getLaborDayHoliday($year = null)
    {
        return $this->getHoldiayById(15, $year);
    }

    public function getPatriotsDayHoliday($year = null)
    {
        return $this->getHoldiayById(16, $year);
    }

    public function getColumbusDayHoliday($year = null)
    {
        return $this->getHoldiayById(17, $year);
    }

    public function getHalloweenDayHoliday($year = null)
    {
        return $this->getHoldiayById(18, $year);
    }

    public function getDaylightSavingEndHoliday($year = null)
    {
        return $this->getHoldiayById(19, $year);
    }

    public function getVeteransDayHoliday($year = null)
    {
        return $this->getHoldiayById(20, $year);
    }

    public function getThanksgivingHoliday($year = null)
    {
        return $this->getHoldiayById(21, $year);
    }

    public function getPearlHarborRemembranceHoliday($year = null)
    {
        return $this->getHoldiayById(22, $year);
    }

    public function getChristmasEveHoliday($year = null)
    {
        return $this->getHoldiayById(23, $year);
    }

    public function getChristmasDayHoliday($year = null)
    {
        return $this->getHoldiayById(24, $year);
    }

    public function getNewYearsEveHoliday($year = null)
    {
        return $this->getHoldiayById(25, $year);
    }

    public function getKwanzaaHoliday($year = null)
    {
        return $this->getHoldiayById(26, $year);
    }

    public function getEarthDayHoliday($year = null)
    {
        return $this->getHoldiayById(27, $year);
    }

    public function getCincoDeMayoHoliday($year = null)
    {
        return $this->getHoldiayById(28, $year);
    }

    public function getJuneteenthHoliday($year = null)
    {
        return $this->getHoldiayById(29, $year);
    }

    public function getIndigenousPeoplesDayHoliday($year = null)
    {
        return $this->getHoldiayById(30, $year);
    }

    public function getTaxDayHoliday($year = null)
    {
        return $this->getHoldiayById(31, $year);
    }
}

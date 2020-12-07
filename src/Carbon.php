<?php
/**
 * US Holidays Wrapper for the Carbon DateTime Library
 */

namespace USHolidays;

/**
 * This extends Carbon and adds support for 41 US holidays.
 */
class Carbon extends \Carbon\Carbon {


    /**
     * An array of all the names of the holidays
     */
    private $holidayArray = ["April Fool's Day","Armed Forces Day","Ash Wednesday","Black Friday","Christmas Day","Christmas Eve","Cinco de Mayo","Columbus Day","Daylight Saving (End)","Daylight Saving (Start)","Earth Day","Easter","Father's Day","Flag Day","Good Friday","Groundhog Day","Halloween","Hanukkah","Independence Day","Indigenous Peoples' Day","Juneteenth","Kwanzaa","Labor Day","Memorial Day","Martin Luther King Jr. Day","Mother's Day","New Year's Day","New Year's Eve","Orthodox Easter","Palm Sunday","Passover","Patriot Day","Pearl Harbor Remembrance Day","Presidents' Day","Rosh Hashanah","St. Patrick's Day","Tax Day","Thanksgiving","Valentine's Day","Veterans Day","Yom Kippur"];

    /**
     * An array of business days
     */
    private $businessDays = [1,2,3,4,5];



    public function setHolidays($holidays)
    {
        $this->holidayArray = $holidays;
    }
    /**
     * Setting April Fools Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setAprilFoolsDay($year)
    {
        return Carbon::create($year, 4, 1, 0, 0, 0);
    }

    /**
     * Setting Armed Forces Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setArmedForcesDay($year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SATURDAY ) {
            $date->next(Carbon::SATURDAY);
        }
        $date->next(Carbon::SATURDAY)->next(Carbon::SATURDAY);

        return $date;
    }

    /**
     * Setting Ash Wednesday
     *
     * @param int $year The year to get the holiday in
     */
    private function setAshWednesday($year)
    {
        return $this->setEaster($year)->subDays(46);
    }

    /**
     * Setting Black Friday
     *
     * @param int $year The year to get the holiday in
     */
    private function setBlackFriday($year)
    {
        return $this->setThanksgiving($year)->addDay();
    }

    /**
     * Setting Christmas Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setChristmasDay($year)
    {
        return Carbon::create($year, 12, 25, 0, 0, 0);
    }

    /**
     * Setting Christmas Eve
     *
     * @param int $year The year to get the holiday in
     */
    private function setChristmasEve($year)
    {
        return Carbon::create($year, 12, 24, 0, 0, 0);
    }

    /**
     * Setting Cinco de Mayo
     *
     * @param int $year The year to get the holiday in
     */
    private function setCincoDeMayo($year)
    {
        return Carbon::create($year, 5, 5, 0, 0, 0);
    }

    /**
     * Setting Columbus Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setColumbusDay($year)
    {
        $date = Carbon::create($year, 10, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY);

        return $date;
    }

    /**
     * Setting Daylight Saving (End)
     *
     * @param int $year The year to get the holiday in
     */
    private function setDaylightSavingEnd($year)
    {
        $date = Carbon::create($year, 11, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }

        return $date;
    }

    /**
     * Setting Daylight Saving (Start)
     *
     * @param int $year The year to get the holiday in
     */
    private function setDaylightSavingStart($year)
    {
        $date = Carbon::create($year, 3, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY);

        return $date;
    }

    /**
     * Setting Earth Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setEarthDay($year)
    {
        return Carbon::create($year, 4, 22, 0, 0, 0);
    }

    /**
     * Setting Easter
     *
     * @param int $year The year to get the holiday in
     */
    private function setEaster($year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);

        return $date->addDays($days);
    }

    /**
     * Setting Fathers Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setFathersDay($year)
    {
        $date = Carbon::create($year, 6, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY)->next(Carbon::SUNDAY);

        return $date;
    }

    /**
     * Setting Flag Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setFlagDay($year)
    {
        return Carbon::create($year, 6, 14, 0, 0, 0);
    }

    /**
     * Setting Good Friday
     *
     * @param int $year The year to get the holiday in
     */
    private function setGoodFriday($year)
    {
        return $this->setEaster($year)->subDays(2);
    }

    /**
     * Setting Groundhog Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setGroundhogDay($year)
    {
        return Carbon::create($year, 2, 2, 0, 0, 0);
    }

    /**
     * Setting Halloween
     *
     * @param int $year The year to get the holiday in
     */
    private function setHalloween($year)
    {
        return Carbon::create($year, 10, 31, 0, 0, 0);
    }

    /**
     * Setting Hanukkah
     *
     * @param int $year The year to get the holiday in
     */
    private function setHanukkah($year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(3, 25, 3761 + intval($year))))->setTime(0, 0, 0);
    }

    /**
     * Setting Independence Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setIndependenceDay($year)
    {
        return Carbon::create($year, 7, 4, 0, 0, 0);
    }

    /**
     * Setting Indigenous Peoples Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setIndigenousPeoplesDay($year)
    {
        return $this->setColumbusDay($year, 0, 0, 0);
    }

    /**
     * Setting Juneteenth
     *
     * @param int $year The year to get the holiday in
     */
    private function setJuneteenth($year)
    {
        return Carbon::create($year, 6, 19, 0, 0, 0);
    }

    /**
     * Setting Kwanzaa
     *
     * @param int $year The year to get the holiday in
     */
    private function setKwanzaa($year)
    {
        return Carbon::create($year, 12, 26, 0, 0, 0);
    }

    /**
     * Setting Labor Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setLaborDay($year)
    {
        $date = Carbon::create($year, 9, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }

        return $date;
    }

    /**
     * Setting Memorial Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMemorialDay($year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        for ($i=0; $i < 7; $i++) {
            if( $date->month === 5 ) {
                $date->next(Carbon::MONDAY);
            }  else {
                $date->subDays(7);
                break;
            }
        }

        return $date;
    }

    /**
     * Setting MLK Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMLKDay($year)
    {
        $date = Carbon::create($year, 1, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        return $date;
    }

    /**
     * Setting Mothers Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setMothersDay($year)
    {
        $date = Carbon::create($year, 5, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY);

        return $date;
    }

    /**
     * Setting NewY ears Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setNewYearsDay($year)
    {
        return Carbon::create($year, 1, 1, 0, 0, 0);
    }

    /**
     * Setting New Years Eve
     *
     * @param int $year The year to get the holiday in
     */
    private function setNewYearsEve($year)
    {
        return Carbon::create($year, 12, 31, 0, 0, 0);
    }

    /**
     * Setting Orthodox Easter
     *
     * @param int $year The year to get the holiday in
     */
    private function setOrthodoxEaster($year)
    {
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        $dt =  mktime(0, 0, 0, $month, $day + 13, $year);

        return Carbon::createFromTimestamp($dt)->setTime(0, 0, 0);
    }

    /**
     * Setting Palm Sunday
     *
     * @param int $year The year to get the holiday in
     */
    private function setPalmSunday($year)
    {
        return $this->setEaster($year)->subWeeks(1);
    }

    /**
     * Setting Passover
     *
     * @param int $year The year to get the holiday in
     */
    private function setPassover($year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(8, 15, 3760 + intval($year))))->setTime(0, 0, 0);
    }

    /**
     * Setting Patriots Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setPatriotsDay($year)
    {
        return Carbon::create($year, 9, 11, 0, 0, 0);
    }

    /**
     * Setting Pearl Harbor Remembrance
     *
     * @param int $year The year to get the holiday in
     */
    private function setPearlHarborRemembrance($year)
    {
        return Carbon::create($year, 12, 7, 0, 0, 0);
    }

    /**
     * Setting Presidents Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setPresidentsDay($year)
    {
        $date = Carbon::create($year, 2, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        return $date;
    }

    /**
     * Setting Rosh Hashanah
     *
     * @param int $year The year to get the holiday in
     */
    private function setRoshHashanah($year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 1, 3761 + intval($year))))->setTime(0, 0, 0);
    }

    /**
     * Setting St Patricks Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setStPatricksDay($year)
    {
        return Carbon::create($year, 3, 17, 0, 0, 0);
    }

    /**
     * Setting Tax Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setTaxDay($year)
    {
        $date = Carbon::create($year, 04, 15, 0, 0, 0);
        if( $date->dayOfWeek === Carbon::SATURDAY || $date->dayOfWeek === Carbon::SUNDAY ) {
            $date->next(Carbon::TUESDAY);
        } else if( $date->dayOfWeek === Carbon::FRIDAY) {
            $date->next(Carbon::MONDAY);
        }

        return $date;
    }

    /**
     * Setting Thanksgiving
     *
     * @param int $year The year to get the holiday in
     */
    private function setThanksgiving($year)
    {
        $date = Carbon::create($year, 11, 1, 0, 0, 0);
        if( $date->dayOfWeek !== Carbon::THURSDAY ) {
            $date->next(Carbon::THURSDAY);
        }
        $date->next(Carbon::THURSDAY)->next(Carbon::THURSDAY)->next(Carbon::THURSDAY);

        return $date;
    }

    /**
     * Setting Valentines Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setValentinesDay($year)
    {
        return Carbon::create($year, 2, 14, 0, 0, 0);
    }

    /**
     * Setting Veterans Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setVeteransDay($year)
    {
        return Carbon::create($year, 11, 11, 0, 0, 0);
    }

    /**
     * Setting Yom Kippur
     *
     * @param int $year The year to get the holiday in
     */
    private function setYomKippur($year)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 10, 3761 + intval($year))))->setTime(0, 0, 0);
    }

    /**
     * An array of all the user added holidays
     */
    private $userAddedHolidays = array();

    /**
     * Get holiday data
     *
     * @param int|null $year The year to get the holidays in
     */
    private function holidays( $year = null ) {
        $this->setTime(0,0,0);
        $holidays = array(
            array(
                'name' => "April Fool's Day",
                'search_names' => ["APRIL FOOL'S DAY", "APRIL FOOLS DAY", "APRIL FOOLS"],
                'date' => function() use ($year) {
                    return $this->setAprilFoolsDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Armed Forces Day",
                'search_names' => ["ARMED FORCES DAY"],
                'date' => function() use ($year) {
                    return $this->setArmedForcesDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Ash Wednesday",
                'search_names' => ["ASH WEDNESDAY"],
                'date' => function() use ($year) {
                    return $this->setAshWednesday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Black Friday",
                'search_names' => ["BLACK FRIDAY", "DAY AFTER THANKSGIVING"],
                'date' => function() use ($year) {
                    return $this->setBlackFriday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Christmas Day",
                'search_names' => ["CHRISTMAS DAY", "CHRISTMAS"],
                'date' => function() use ($year) {
                    return $this->setChristmasDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Christmas Eve",
                'search_names' => ["CHRISTMAS EVE"],
                'date' => function() use ($year) {
                    return $this->setChristmasEve($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Cinco de Mayo",
                'search_names' => ["CINCO DE MAYO"],
                'date' => function() use ($year) {
                    return $this->setCincoDeMayo($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Columbus Day",
                'search_names' => ["COLUMBUS DAY"],
                'date' => function() use ($year) {
                    return $this->setColumbusDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Daylight Saving (End)",
                'search_names' => ["DAYLIGHT SAVING (END)", "DAYLIGHT SAVING END", "DAYLIGHT SAVINGS (END)", "DAYLIGHT SAVINGS END"],
                'date' => function() use ($year) {
                    return $this->setDaylightSavingEnd($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Daylight Saving (Start)",
                'search_names' => ["DAYLIGHT SAVING (START)", "DAYLIGHT SAVING START", "DAYLIGHT SAVINGS (START)", "DAYLIGHT SAVINGS START"],
                'date' => function() use ($year) {
                    return $this->setDaylightSavingStart($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Earth Day",
                'search_names' => ["EARTH DAY"],
                'date' => function() use ($year) {
                    return $this->setEarthDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Easter",
                'search_names' => ["EASTER"],
                'date' => function() use ($year) {
                    return $this->setEaster($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Father's Day",
                'search_names' => ["FATHER'S DAY", "FATHERS DAY"],
                'date' => function() use ($year) {
                    return $this->setFathersDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Flag Day",
                'search_names' => ["FLAG DAY"],
                'date' => function() use ($year) {
                    return $this->setFlagDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Good Friday",
                'search_names' => ["GOOD FRIDAY"],
                'date' => function() use ($year) {
                    return $this->setGoodFriday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Groundhog Day",
                'search_names' => ["GROUNDHOG DAY", "GROUNDHOGS DAY"],
                'date' => function() use ($year) {
                    return $this->setGroundhogDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Halloween",
                'search_names' => ["HALLOWEEN"],
                'date' => function() use ($year) {
                    return $this->setHalloween($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Hanukkah",
                'search_names' => ["HANUKKAH"],
                'date' => function() use ($year) {
                    return $this->setHanukkah($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Independence Day",
                'search_names' => ["INDEPENDENCE DAY", "FORUTH OF JULY", "4TH OF JULY"],
                'date' => function() use ($year) {
                    return $this->setIndependenceDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Indigenous Peoples' Day",
                'search_names' => ["INDIGENOUS PEOPLES' DAY", "INDIGENOUS PEOPLES DAY"],
                'date' => function() use ($year) {
                    return $this->setIndigenousPeoplesDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Juneteenth",
                'search_names' => ["JUNETEENTH"],
                'date' => function() use ($year) {
                    return $this->setJuneteenth($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Kwanzaa",
                'search_names' => ["KWANZAA"],
                'date' => function() use ($year) {
                    return $this->setKwanzaa($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Labor Day",
                'search_names' => ["LABOR DAY"],
                'date' => function() use ($year) {
                    return $this->setLaborDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Memorial Day",
                'search_names' => ["MEMORIAL DAY"],
                'date' => function() use ($year) {
                    return $this->setMemorialDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Martin Luther King Jr. Day",
                'search_names' => ["MARTIN LUTHER KING JR. DAY", "MARTIN LUTHER KING JR DAY", "MLK DAY"],
                'date' => function() use ($year) {
                    return $this->setMLKDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Mother's Day",
                'search_names' => ["MOTHER'S DAY", "MOTHERS DAY"],
                'date' => function() use ($year) {
                    return $this->setMothersDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "New Year's Day",
                'search_names' => ["NEW YEAR'S DAY", "NEW YEARS DAY", "NEW YEARS"],
                'date' => function() use ($year) {
                    return $this->setNewYearsDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "New Year's Eve",
                'search_names' => ["NEW YEAR'S EVE", "NEW YEARS EVE"],
                'date' => function() use ($year) {
                    return $this->setNewYearsEve($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Orthodox Easter",
                'search_names' => ["ORTHODOX EASTER"],
                'date' => function() use ($year) {
                    return $this->setOrthodoxEaster($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Palm Sunday",
                'search_names' => ["PALM SUNDAY"],
                'date' => function() use ($year) {
                    return $this->setPalmSunday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Passover",
                'search_names' => ["PASSOVER"],
                'date' => function() use ($year) {
                    return $this->setPassover($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Patriot Day",
                'search_names' => ["PATRIOT DAY"],
                'date' => function() use ($year) {
                    return $this->setPatriotsDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Pearl Harbor Remembrance Day",
                'search_names' => ["PEARL HARBOR REMEMBRANCE DAY"],
                'date' => function() use ($year) {
                    return $this->setPearlHarborRemembrance($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Presidents' Day",
                'search_names' => ["PRESIDENTS' DAY", "PRESIDENTS DAY"],
                'date' => function() use ($year) {
                    return $this->setPresidentsDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Rosh Hashanah",
                'search_names' => ["ROSH HASHANAH"],
                'date' => function() use ($year) {
                    return $this->setRoshHashanah($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "St. Patrick's Day",
                'search_names' => ["ST. PATRICK'S DAY", "ST PATRICKS DAY", "ST. PATRICKS DAY", "SAINT PATRICKS DAY"],
                'date' => function() use ($year) {
                    return $this->setStPatricksDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Tax Day",
                'search_names' => ["TAX DAY"],
                'date' => function() use ($year) {
                    return $this->setTaxDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Thanksgiving",
                'search_names' => ["THANKSGIVING"],
                'date' => function() use ($year) {
                    return $this->setThanksgiving($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Valentine's Day",
                'search_names' => ["VALENTINE'S DAY", "VALENTINES DAY", "VALENTINES"],
                'date' => function() use ($year) {
                    return $this->setValentinesDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Veterans Day",
                'search_names' => ["VETERANS DAY"],
                'date' => function() use ($year) {
                    return $this->setVeteransDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Yom Kippur",
                'search_names' => ["YOM KIPPUR"],
                'date' => function() use ($year) {
                    return $this->setYomKippur($year);
                },
                'bank_holiday' => false
            ),
        );

        $userHolidays = $this->userAddedHolidays;

        foreach ($userHolidays as $userHoliday) {

            if(is_callable($userHoliday['date'])) {
                $date = $userHoliday['date'];
            } else {
                $date = function() use ($year, $userHoliday) {
                    $day = $userHoliday['date']->day;
                    $month = $userHoliday['date']->month;
                    return Carbon::create($year, $month, $day, 0, 0, 0);
                };
            }

            $bankHoliday = $userHoliday['bank_holiday'];

            array_push($holidays,
                array(
                    'name' => $userHoliday['name'],
                    'search_names' => [\strtoupper($userHoliday['name']), \strtoupper(\str_replace("'", '', $userHoliday['name']))],
                    'date' => $date,
                    'bank_holiday' => $bankHoliday
                )
            );
        }

        return $holidays;
    }

    /**
     * Add an user defined holiday
     *
     * @param array $data The year to get the holidays in
     */
    public function addHoliday($data)
    {
        array_push($this->userAddedHolidays, $data);
        array_push($this->holidayArray, $data['name']);
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
        return $a->date > $b->date;
    }

    /**
     *  Returns holidays in the specified years
     *
     * @param string|array $name The name(s) of the holidays to get
     * @param int|null $year The year to get the holidays in
     */
    public function getHolidaysByYear($name, $year=null)
    {
        // this is primarily for isBankHoliday() can get a list of holidays without a loop
        $bankHolidayCheck = true;
        if($name == 'no-bank-check') {
            $bankHolidayCheck = false;
            $name = 'all';
        }
        if($name == 'all' || $name == null) $name = $this->holidayArray;
        $year = $year ? $year : $this->year;
        $holidays = $this->holidays($year);
        $holidaySearchNames = array_column($holidays, 'search_names');
        $holiday_details = array();

        if(is_string($name)) {

            $index = false;
            foreach ($holidaySearchNames as $key => $holidaySearchName) {
                if( array_search(strtoupper($name), $holidaySearchName ) !== false ) {
                    $index = $key;
                }
            }

            if($index !== false) {

                $currentYear = $this->copy()->year;
                $this->year = $year;
                $date = call_user_func($holidays[$index]['date']);
                $this->year = $currentYear;

                $days_until = $this->diffInDays($date);

                $bankHoliday = $holidays[$index]['bank_holiday'];
                if($bankHoliday && $bankHolidayCheck) {
                    $date->isBankHoliday();
                }

                $details = (object) [
                    'name' => $holidays[$index]['name'],
                    'date' => $date,
                    'bank_holiday' => $bankHoliday,
                    'days_away' => $days_until
                ];

                array_push($holiday_details, $details);
            }

        } elseif (is_array($name)) {

            foreach ($name as $search_name) {
                foreach ($holidaySearchNames as $key => $holidaySearchName) {
                    if( array_search(strtoupper($search_name), $holidaySearchName ) !== false ) {
                        $index = $key;

                        if($index !== false) {

                            $currentYear = $this->year;
                            $this->year = $year;
                            $date = call_user_func($holidays[$index]['date']);
                            $this->year = $currentYear;

                            $days_until =  $this->diffInDays($date);

                            $bankHoliday = $holidays[$index]['bank_holiday'];

                            if($bankHoliday && $bankHolidayCheck) {
                                $date->isBankHoliday();
                            }

                            $details = (object) [
                                'name' => $holidays[$index]['name'],
                                'date' => $date,
                                'bank_holiday' => $bankHoliday,
                                'days_away' => $days_until
                            ];

                            array_push($holiday_details, $details);
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
            $holidayYear = $this->getHolidaysByYear($holidays, intval($i));

            foreach ($holidayYear as $holiday) {
                if( $holiday->date->lessThanOrEqualTo($searchStartDate->copy()->addDays($days)) && $holiday->date->greaterThanOrEqualTo($searchStartDate) ) {
                    array_push($holidaysInRange, $holiday);
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
            $days = $this->diffInDays($this->copy()->addYears($years)->subDays(1));
        } else {
            $days = $this->diffInDays($this->copy()->subYears($years)->subDays(1)) * -1;
        }

        return $this->getHolidaysInDays($days, $holidays);
    }

    /**
     * Check if a date is a holiday. returns boolean
     */
    public function isHoliday()
    {
        $holidays = $this->getHolidaysByYear('all');
        $isHoliday = false;

        foreach ($holidays as $holiday) {

            if( $this->isBirthday($holiday->date) ) {
                $isHoliday = true;
                break;
            }
        }

        return $isHoliday;
    }

    /**
     * Check if a date is a bank holiday. returns boolean
     */
    public function isBankHoliday()
    {
        $holidays = $this->getHolidaysByYear('no-bank-check');
        $isBankHoliday = false;

        foreach ( $holidays as $holiday) {
            if( $holiday->bank_holiday ) {
                if( $this->isBirthday($holiday->date) && $this->dayOfWeek !== Carbon::SUNDAY && $this->dayOfWeek !== Carbon::SATURDAY ) {
                    $isBankHoliday = true;
                    break;
                } else {
                    if( $this->dayOfWeek === Carbon::MONDAY ) {
                        if( $this->copy()->subDay()->isBirthday($holiday->date) ) {
                            $isBankHoliday = true;
                            break;
                        }
                    } else if( $this->dayOfWeek === Carbon::FRIDAY ) {
                        if( $this->copy()->addDay()->isBirthday($holiday->date) ) {
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
     * Get the holiday names, if any for the given date
     */
    public function getHolidayName()
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
    public function getNextHolidays($number=1)
    {
        $number_of_years = ceil($number / count($this->holidayArray));

        $holidays = $this->getHolidaysInYears($number_of_years);
        $count = count($holidays);

        return array_slice($holidays, 0, $number);
    }

    /**
     * Return previous holiday(s)
     *
     * @param int|null $number the number of holidays to get. default is 1
     */
    public function getPrevHolidays($number=1)
    {
        $number_of_years = ceil($number / count($this->holidayArray)) * -1;

        $holidays = $this->getHolidaysInYears($number_of_years);
        $count = count($holidays);

        return array_reverse(array_slice($holidays, $count - $number, $count));


        // $holidays = $this->copy()->subyear()->getHolidaysInYears(1);
        // $last_holiday = end($holidays);
        //
        // return $this->getHolidaysByYear($last_holiday->name, $last_holiday->date->format('Y'))[0];
    }

    /**
     * Return next holiday name
     */
    public function getNextHolidayName()
    {
        return $this->getNextHolidays()[0]->name;
    }

    /**
     * Return next holiday days away
     */
    public function getNextHolidayDays()
    {
        return $this->getNextHolidays()[0]->days_away;
    }

    /**
     * Return next holiday name
     */
    public function getPrevHolidayName()
    {
        return $this->getPrevHolidays()[0]->name;
    }

    /**
     * Return next holiday days away
     */
    public function getPrevHolidayDays()
    {
        return $this->getPrevHolidays()[0]->days_away;
    }

    /**
      * Return object of April Fools Day for given year
      *
      * @param int|null $year The year to get the holiday in
      */
    public function getAprilFoolsDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("April Fool's Day", $year)[0];
    }

    /**
     * Return object of Armed Forces Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getArmedForcesDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Armed Forces Day", $year)[0];
    }

    /**
     * Return object of Ash Wednesday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getAshWednesdayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Ash Wednesday", $year)[0];
    }

    /**
     * Return object of Black Friday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getBlackFridayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Black Friday", $year)[0];
    }

    /**
     * Return object of Christmas Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getChristmasDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Christmas Day", $year)[0];
    }

    /**
     * Return object of Christmas Eve for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getChristmasEveHoliday($year = null)
    {
        return $this->getHolidaysByYear("Christmas Eve", $year)[0];
    }

    /**
     * Return object of Cinco de Mayo for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getCincoDeMayoHoliday($year = null)
    {
        return $this->getHolidaysByYear("Cinco de Mayo", $year)[0];
    }

    /**
     * Return object of Columbus Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getColumbusDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Columbus Day", $year)[0];
    }

    /**
     * Return object of Daylight Saving (End) for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getDaylightSavingEndHoliday($year = null)
    {
        return $this->getHolidaysByYear("Daylight Saving (End)", $year)[0];
    }

    /**
     * Return object of Daylight Saving (Start) for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getDaylightSavingStartHoliday($year = null)
    {
        return $this->getHolidaysByYear("Daylight Saving (Start)", $year)[0];
    }

    /**
     * Return object of Earth Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEarthDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Earth Day", $year)[0];
    }

    /**
     * Return object of Easter for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEasterHoliday($year = null)
    {
        return $this->getHolidaysByYear("Easter", $year)[0];
    }

    /**
     * Return object of Father Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFathersDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Father's Day", $year)[0];
    }

    /**
     * Return object of Flag Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFlagDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Flag Day", $year)[0];
    }

    /**
     * Return object of Good Friday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getGoodFridayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Good Friday", $year)[0];
    }

    /**
     * Return object of Groundhog Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getGroundhogDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Groundhog Day", $year)[0];
    }

    /**
     * Return object of Halloween for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getHalloweenHoliday($year = null)
    {
        return $this->getHolidaysByYear("Halloween", $year)[0];
    }

    /**
     * Return object of Hanukkah for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getHanukkahHoliday($year = null)
    {
        return $this->getHolidaysByYear("Hanukkah", $year)[0];
    }

    /**
     * Return object of Independence Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getIndependenceDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Independence Day", $year)[0];
    }

    /**
     * Return object of Indigenous Peoples Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getIndigenousPeoplesDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Indigenous Peoples' Day", $year)[0];
    }

    /**
     * Return object of Juneteenth for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getJuneteenthHoliday($year = null)
    {
        return $this->getHolidaysByYear("Juneteenth", $year)[0];
    }

    /**
     * Return object of Kwanzaa for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getKwanzaaHoliday($year = null)
    {
        return $this->getHolidaysByYear("Kwanzaa", $year)[0];
    }

    /**
     * Return object of Labor Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getLaborDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Labor Day", $year)[0];
    }

    /**
     * Return object of Memorial Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMemorialDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Memorial Day", $year)[0];
    }

    /**
     * Return object of MLK Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMLKDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Martin Luther King Jr. Day", $year)[0];
    }

    /**
     * Return object of Mothers Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getMothersDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Mother's Day", $year)[0];
    }

    /**
     * Return object of New Years Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getNewYearsDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("New Year's Day", $year)[0];
    }

    /**
     * Return object of New Years Eve for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getNewYearsEveHoliday($year = null)
    {
        return $this->getHolidaysByYear("New Year's Eve", $year)[0];
    }

    /**
     * Return object of Orthodox Easter for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getOrthodoxEasterHoliday($year = null)
    {
        return $this->getHolidaysByYear("Orthodox Easter", $year)[0];
    }

    /**
     * Return object of Palm Sunday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPalmSundayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Palm Sunday", $year)[0];
    }

    /**
     * Return object of Passover for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPassoverHoliday($year = null)
    {
        return $this->getHolidaysByYear("Passover", $year)[0];
    }

    /**
     * Return object of Patriot Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPatriotDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Patriot Day", $year)[0];
    }

    /**
     * Return object of Pearl Harbor Remembrance Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPearlHarborRemembranceDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Pearl Harbor Remembrance Day", $year)[0];
    }

    /**
     * Return object of Presidents Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPresidentsDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Presidents' Day", $year)[0];
    }

    /**
     * Return object of Rosh Hashanah for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getRoshHashanahHoliday($year = null)
    {
        return $this->getHolidaysByYear("Rosh Hashanah", $year)[0];
    }

    /**
     * Return object of St Patricks Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getStPatricksDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("St. Patrick's Day", $year)[0];
    }

    /**
     * Return object of Tax Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getTaxDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Tax Day", $year)[0];
    }

    /**
     * Return object of Thanksgiving for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getThanksgivingHoliday($year = null)
    {
        return $this->getHolidaysByYear("Thanksgiving", $year)[0];
    }

    /**
     * Return object of Valentines Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getValentinesDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Valentine's Day", $year)[0];
    }

    /**
     * Return object of Veterans Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getVeteransDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Veterans Day", $year)[0];
    }

    /**
     * Return object of Yom Kippur for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getYomKippurHoliday($year = null)
    {
        return $this->getHolidaysByYear("Yom Kippur", $year)[0];
    }


    public function setBusinessHolidays($holidays)
    {
        return $this->businessHolidays = $holidays;
    }

    public function setBusinessDays($days)
    {
        return $this->businessDays = $days;
    }

    public function isBusinessDay()
    {
        return;  // boolean
    }


    public function nextBusinessDay()
    {
        return;  // Carbon date object, isHoliday, holiday data if is holiday
    }

    public function prevBusinessDay()
    {
        return;  // Carbon date object, isHoliday, holiday data if is holiday
    }

    public function currentOrNextBusinessDay()
    {
        return;  // Carbon date object, isHoliday, holiday data if is holiday
    }

    public function currentOrPreviousBusinessDay()
    {
        return;  // Carbon date object, isHoliday, holiday data if is holiday
    }
}

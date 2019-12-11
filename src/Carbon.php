<?php

namespace USHolidays;

class Carbon extends \Carbon\Carbon {

    private function setAprilFoolsDay($year = null)
    {
        return Carbon::create($year, 4, 1);
    }

    private function setArmedForcesDay($year = null)
    {
        $date = Carbon::create($year, 5, 1);
        if( $date->dayOfWeek !== Carbon::SATURDAY ) {
            $date->next(Carbon::SATURDAY);
        }
        $date->next(Carbon::SATURDAY)->next(Carbon::SATURDAY);

        return $date;
    }

    private function setAshWednesday($year = null)
    {
        return $this->setEaster($year)->subDays(46);
    }

    private function setBlackFriday($year = null)
    {
        return $this->setThanksgiving($year)->addDay();
    }

    private function setChristmasDay($year = null)
    {
        return Carbon::create($year, 12, 25);
    }

    private function setChristmasEve($year = null)
    {
        return Carbon::create($year, 12, 24);
    }

    private function setCincoDeMayo($year = null)
    {
        return Carbon::create($year, 5, 5);
    }

    private function setColumbusDay($year = null)
    {
        $date = Carbon::create($year, 10, 1);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY);

        return $date;
    }

    private function setDaylightSavingEnd($year = null)
    {
        $date = Carbon::create($year, 11, 1);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }

        return $date;
    }

    private function setDaylightSavingStart($year = null)
    {
        $date = Carbon::create($year, 3, 1);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY);

        return $date;
    }

    private function setEarthDay($year = null)
    {
        return Carbon::create($year, 4, 22);
    }

    private function setEaster($year = null)
    {
        return Carbon::createFromTimestamp(easter_date($year));;
    }

    private function setFathersDay($year = null)
    {
        $date = Carbon::create($year, 6, 1);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY)->next(Carbon::SUNDAY);

        return $date;
    }

    private function setFlagDay($year = null)
    {
        return Carbon::create($year, 6, 14);
    }

    private function setGoodFriday($year = null)
    {
        return $this->setEaster($year)->subDays(2);
    }

    private function setGroundhogDay($year = null)
    {
        return Carbon::create($year, 2, 2);
    }

    private function setHalloweenDay($year = null)
    {
        return Carbon::create($year, 10, 31);
    }

    private function setHanukkah($year = null)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(3, 25, 3761 + intval($year))));
    }

    private function setIndependenceDay($year = null)
    {
        return Carbon::create($year, 7, 4);
    }

    private function setIndigenousPeoplesDay($year = null)
    {
        return $this->setColumbusDay($year);
    }

    private function setJuneteenth($year = null)
    {
        return Carbon::create($year, 6, 19);
    }

    private function setKwanzaa($year = null)
    {
        return Carbon::create($year, 12, 26);
    }

    private function setLaborDay($year = null)
    {
        $date = Carbon::create($year, 9, 1);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }

        return $date;
    }

    private function setMemorialDay($year = null)
    {
        $date = Carbon::create($year, 5, 1);
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

    private function setMLKDay($year = null)
    {
        $date = Carbon::create($year, 1, 1);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        return $date;
    }

    private function setMothersDay($year = null)
    {
        $date = Carbon::create($year, 5, 1);
        if( $date->dayOfWeek !== Carbon::SUNDAY ) {
            $date->next(Carbon::SUNDAY);
        }
        $date->next(Carbon::SUNDAY);

        return $date;
    }

    private function setNewYearsDay($year = null)
    {
        return Carbon::create($year, 1, 1);
    }

    private function setNewYearsEve($year = null)
    {
        return Carbon::create($year, 12, 31);
    }

    private function setOrthodoxEaster($year = null)
    {
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        $dt =  mktime(0, 0, 0, $month, $day + 13, $year);

        return Carbon::createFromTimestamp($dt);
    }

    private function setPalmSunday($year = null)
    {
        return $this->setEaster($year)->subWeeks(1);
    }

    private function setPassover($year = null)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(8, 15, 3760 + intval($year))))->setTime(0, 0, 0);
    }

    private function setPatriotsDay($year = null)
    {
        return Carbon::create($year, 9, 11);
    }

    private function setPearlHarborRemembrance($year = null)
    {
        return Carbon::create($year, 12, 7);
    }

    private function setPresidentsDay($year = null)
    {
        $date = Carbon::create($year, 2, 1);
        if( $date->dayOfWeek !== Carbon::MONDAY ) {
            $date->next(Carbon::MONDAY);
        }
        $date->next(Carbon::MONDAY)->next(Carbon::MONDAY);

        return $date;
    }

    private function setRoshHashanah($year = null)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 1, 3761 + intval($year))))->setTime(0, 0, 0);;
    }

    private function setStPatricksDay($year = null)
    {
        return Carbon::create($year, 3, 17);
    }

    private function setTaxDay($year = null)
    {
        $date = Carbon::create($year, 04, 15);
        if( $date->dayOfWeek === Carbon::SATURDAY || $date->dayOfWeek === Carbon::SUNDAY ) {
            $date->next(Carbon::TUESDAY);
        } else if( $date->dayOfWeek === Carbon::FRIDAY) {
            $date->next(Carbon::MONDAY);
        }

        return $date;
    }

    private function setThanksgiving($year = null)
    {
        $date = Carbon::create($year, 11, 1);
        if( $date->dayOfWeek !== Carbon::THURSDAY ) {
            $date->next(Carbon::THURSDAY);
        }
        $date->next(Carbon::THURSDAY)->next(Carbon::THURSDAY)->next(Carbon::THURSDAY);

        return $date;
    }

    private function setValentinesDay($year = null)
    {
        return Carbon::create($year, 2, 14);
    }

    private function setVeteransDay($year = null)
    {
        return Carbon::create($year, 11, 11);
    }

    private function setYomKippur($year = null)
    {
        return Carbon::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 10, 3761 + intval($year))))->setTime(0, 0, 0);
    }


    private function getHolidays( $year = null ) {
        $holidays = array(
            array(
                'name' => "April Fool's Day",
                'date' => function() use ($year) {
                    return $this->setAprilFoolsDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Armed Forces Day",
                'date' => function() use ($year) {
                    return $this->setArmedForcesDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Ash Wednesday",
                'date' => function() use ($year) {
                    return $this->setAshWednesday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Black Friday",
                'date' => function() use ($year) {
                    return $this->setBlackFriday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Christmas Day",
                'date' => function() use ($year) {
                    return $this->setChristmasDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Christmas Eve",
                'date' => function() use ($year) {
                    return $this->setChristmasEve($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Cinco de Mayo",
                'date' => function() use ($year) {
                    return $this->setCincoDeMayo($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Columbus Day",
                'date' => function() use ($year) {
                    return $this->setColumbusDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Daylight Saving (End)",
                'date' => function() use ($year) {
                    return $this->setDaylightSavingEnd($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Daylight Saving (Start)",
                'date' => function() use ($year) {
                    return $this->setDaylightSavingStart($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Earth Day",
                'date' => function() use ($year) {
                    return $this->setEarthDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Easter",
                'date' => function() use ($year) {
                    return $this->setEaster($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Father's Day",
                'date' => function() use ($year) {
                    return $this->setFathersDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Flag Day",
                'date' => function() use ($year) {
                    return $this->setFlagDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Good Friday",
                'date' => function() use ($year) {
                    return $this->setGoodFriday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Groundhog Day",
                'date' => function() use ($year) {
                    return $this->setGroundhogDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Halloween",
                'date' => function() use ($year) {
                    return $this->setHalloweenDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Hanukkah",
                'date' => function() use ($year) {
                    return $this->setHanukkah($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Independence Day",
                'date' => function() use ($year) {
                    return $this->setIndependenceDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Indigenous Peoples' Day",
                'date' => function() use ($year) {
                    return $this->setIndigenousPeoplesDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Juneteenth",
                'date' => function() use ($year) {
                    return $this->setJuneteenth($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Kwanzaa",
                'date' => function() use ($year) {
                    return $this->setKwanzaa($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Labor Day",
                'date' => function() use ($year) {
                    return $this->setLaborDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Memorial Day",
                'date' => function() use ($year) {
                    return $this->setMemorialDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Martin Luther King Jr. Day",
                'date' => function() use ($year) {
                    return $this->setMLKDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Mother's Day",
                'date' => function() use ($year) {
                    return $this->setMothersDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "New Year's Day",
                'date' => function() use ($year) {
                    return $this->setNewYearsDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "New Year's Eve",
                'date' => function() use ($year) {
                    return $this->setNewYearsEve($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Orthodox Easter",
                'date' => function() use ($year) {
                    return $this->setOrthodoxEaster($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Palm Sunday",
                'date' => function() use ($year) {
                    return $this->setPalmSunday($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Passover",
                'date' => function() use ($year) {
                    return $this->setPassover($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Patriot Day",
                'date' => function() use ($year) {
                    return $this->setPatriotsDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Pearl Harbor Remembrance Day",
                'date' => function() use ($year) {
                    return $this->setPearlHarborRemembrance($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Presidents' Day",
                'date' => function() use ($year) {
                    return $this->setPresidentsDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Rosh Hashanah",
                'date' => function() use ($year) {
                    return $this->setRoshHashanah($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "St. Patrick's Day",
                'date' => function() use ($year) {
                    return $this->setStPatricksDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Tax Day",
                'date' => function() use ($year) {
                    return $this->setTaxDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Thanksgiving",
                'date' => function() use ($year) {
                    return $this->setThanksgiving($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Valentine's Day",
                'date' => function() use ($year) {
                    return $this->setValentinesDay($year);
                },
                'bank_holiday' => false
            ),
            array(
                'name' => "Veterans Day",
                'date' => function() use ($year) {
                    return $this->setVeteransDay($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Yom Kippur",
                'date' => function() use ($year) {
                    return $this->setYomKippur($year);
                },
                'bank_holiday' => false
            ),
        );

        return $holidays;
    }

    private function getHolidayByName($name, $year)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $index = array_search($name, array_column($holidays, 'name') );
        $date = call_user_func($holidays[$index]['date']);
        $this->modify($date);
        return $date;
    }

    public function isHoliday($year = null)
    {
        $year = $year ? $year : $this->year;
        $holidays = $this->getHolidays($year);
        $isHoliday = false;

        foreach ($holidays as $holiday) {
            $holidayDate = call_user_func($holiday['date']);
            $dateToCheck = $this->copy();

            if( $this->isBirthday($holidayDate) ) {
                $isHoliday = true;
                break;
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
            $holidayDate = call_user_func($holiday['date']);
            $dateToCheck = $this->copy();


            if( $dateToCheck->isBirthday($holidayDate) && $holiday['bank_holiday'] ) {
                if($dateToCheck->dayOfWeek !== Carbon::SUNDAY && $dateToCheck->dayOfWeek !== Carbon::SATURDAY) {
                    $isBankHoliday = true;
                    break;
                }

            } else {
                if( $dateToCheck->dayOfWeek === Carbon::MONDAY ) {
                    $dateToCheck->subDay();

                    if( $dateToCheck->isBirthday($holidayDate) && $holiday['bank_holiday'] ) {
                        $isBankHoliday = true;
                        break;
                    } else {
                        $dateToCheck->addDay();
                    }
                } else if( $dateToCheck->dayOfWeek === Carbon::FRIDAY ) {
                    $dateToCheck->addDay();

                    if( $dateToCheck->isBirthday($holidayDate) && $holiday['bank_holiday'] ) {
                        $isBankHoliday = true;
                        break;
                    } else {
                        $dateToCheck->subDay();
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
            $holidayDate = call_user_func($holiday['date']);
            $dateToCheck = $this->copy();

            if( $dateToCheck->isBirthday($holidayDate) ) {
                $holidayName .= $holiday['name'] . ', ';
            } else {
                if( $dateToCheck->dayOfWeek === Carbon::MONDAY ) {
                    $dateToCheck->subDay();

                    if( $dateToCheck->isBirthday($holidayDate) && $holiday['bank_holiday'] ) {
                        $holidayName .= $holiday['name'] . ' (Observed), ';
                    }
                } else if( $dateToCheck->dayOfWeek === Carbon::FRIDAY ) {
                    $dateToCheck->addDay();

                    if( $dateToCheck->isBirthday($holidayDate) && $holiday['bank_holiday'] ) {
                        $holidayName .= $holiday['name'] . ' (Observed), ';
                    }
                }
            }
        }

        if( $holidayName ) {
            $holidayName = rtrim($holidayName, ', ');
        }

        return $holidayName;
    }


    public function getAprilFoolsDayHoliday($year = null)
    {
        return $this->getHolidayByName("April Fool's Day", $year);
    }

    public function getArmedForcesDayHoliday($year = null)
    {
        return $this->getHolidayByName("Armed Forces Day", $year);
    }

    public function getAshWednesdayHoliday($year = null)
    {
        return $this->getHolidayByName("Ash Wednesday", $year);
    }

    public function getBlackFridayHoliday($year = null)
    {
        return $this->getHolidayByName("Black Friday", $year);
    }

    public function getChristmasDayHoliday($year = null)
    {
        return $this->getHolidayByName("Christmas Day", $year);
    }

    public function getChristmasEveHoliday($year = null)
    {
        return $this->getHolidayByName("Christmas Eve", $year);
    }

    public function getCincoDeMayoHoliday($year = null)
    {
        return $this->getHolidayByName("Cinco de Mayo", $year);
    }

    public function getColumbusDayHoliday($year = null)
    {
        return $this->getHolidayByName("Columbus Day", $year);
    }

    public function getDaylightSavingEndHoliday($year = null)
    {
        return $this->getHolidayByName("Daylight Saving (End)", $year);
    }

    public function getDaylightSavingStartHoliday($year = null)
    {
        return $this->getHolidayByName("Daylight Saving (Start)", $year);
    }

    public function getEarthDayHoliday($year = null)
    {
        return $this->getHolidayByName("Earth Day", $year);
    }

    public function getEasterHoliday($year = null)
    {
        return $this->getHolidayByName("Easter", $year);
    }

    public function getFathersDayHoliday($year = null)
    {
        return $this->getHolidayByName("Father's Day", $year);
    }

    // typo'd in old version // added "s" on flag // for backward compatibility
    public function getFlagsDayHoliday($year = null)
    {
        return $this->getHolidayByName("Flag Day", $year);
    }

    public function getFlagDayHoliday($year = null)
    {
        return $this->getHolidayByName("Flag Day", $year);
    }

    public function getGoodFridayHoliday($year = null)
    {
        return $this->getHolidayByName("Good Friday", $year);
    }

    public function getGroundhogDayHoliday($year = null)
    {
        return $this->getHolidayByName("Groundhog Day", $year);
    }

    // typo'd in old version // added "Day" on end // for backward compatibility
    public function getHalloweenDayHoliday($year = null)
    {
        return $this->getHolidayByName("Halloween", $year);
    }

    public function getHalloweenHoliday($year = null)
    {
        return $this->getHolidayByName("Halloween", $year);
    }

    public function getHanukkahHoliday($year = null)
    {
        return $this->getHolidayByName("Hanukkah", $year);
    }

    public function getIndependenceDayHoliday($year = null)
    {
        return $this->getHolidayByName("Independence Day", $year);
    }

    public function getIndigenousPeoplesDayHoliday($year = null)
    {
        return $this->getHolidayByName("Indigenous Peoples' Day", $year);
    }

    public function getJuneteenthHoliday($year = null)
    {
        return $this->getHolidayByName("Juneteenth", $year);
    }

    public function getKwanzaaHoliday($year = null)
    {
        return $this->getHolidayByName("Kwanzaa", $year);
    }

    public function getLaborDayHoliday($year = null)
    {
        return $this->getHolidayByName("Labor Day", $year);
    }

    public function getMemorialDayHoliday($year = null)
    {
        return $this->getHolidayByName("Memorial Day", $year);
    }

    public function getMLKDayHoliday($year = null)
    {
        return $this->getHolidayByName("Martin Luther King Jr. Day", $year);
    }

    public function getMothersDayHoliday($year = null)
    {
        return $this->getHolidayByName("Mother's Day", $year);
    }

    public function getNewYearsDayHoliday($year = null)
    {
        return $this->getHolidayByName("New Year's Day", $year);
    }

    public function getNewYearsEveHoliday($year = null)
    {
        return $this->getHolidayByName("New Year's Eve", $year);
    }

    public function getOrthodoxEasterHoliday($year = null)
    {
        return $this->getHolidayByName("Orthodox Easter", $year);
    }

    public function getPalmSundayHoliday($year = null)
    {
        return $this->getHolidayByName("Palm Sunday", $year);
    }

    public function getPassoverHoliday($year = null)
    {
        return $this->getHolidayByName("Passover", $year);
    }

    // typo'd in old version // added "s" on Patriot // for backward compatibility
    public function getPatriotsDayHoliday($year = null)
    {
        return $this->getHolidayByName("Patriot Day", $year);
    }

    public function getPatriotDayHoliday($year = null)
    {
        return $this->getHolidayByName("Patriot Day", $year);
    }

    // typo'd in old version // forgot to add "day" on end // for backward compatibility
    public function getPearlHarborRemembranceHoliday($year = null)
    {
        return $this->getHolidayByName("Pearl Harbor Remembrance Day", $year);
    }

    public function getPearlHarborRemembranceDayHoliday($year = null)
    {
        return $this->getHolidayByName("Pearl Harbor Remembrance Day", $year);
    }

    public function getPresidentsDayHoliday($year = null)
    {
        return $this->getHolidayByName("Presidents' Day", $year);
    }

    public function getRoshHashanahHoliday($year = null)
    {
        return $this->getHolidayByName("Rosh Hashanah", $year);
    }

    public function getStPatricksDayHoliday($year = null)
    {
        return $this->getHolidayByName("St. Patrick's Day", $year);
    }

    public function getTaxDayHoliday($year = null)
    {
        return $this->getHolidayByName("Tax Day", $year);
    }

    public function getThanksgivingHoliday($year = null)
    {
        return $this->getHolidayByName("Thanksgiving", $year);
    }

    public function getValentinesDayHoliday($year = null)
    {
        return $this->getHolidayByName("Valentine's Day", $year);
    }

    public function getVeteransDayHoliday($year = null)
    {
        return $this->getHolidayByName("Veterans Day", $year);
    }

    public function getYomKippurHoliday($year = null)
    {
        return $this->getHolidayByName("Yom Kippur", $year);
    }
}

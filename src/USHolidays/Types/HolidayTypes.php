<?php

namespace USHolidays\Types;

/**
 * @phpstan-type HolidayDetail object{name: string, date: \USHolidays\USHolidays, bank_holiday: bool, federal_holiday: bool, days_away: int, start_year: int|null, end_year: int|null, bank_holiday_start_year: int|null, bank_holiday_end_year: int|null, federal_holiday_start_year: int|null, federal_holiday_end_year: int|null}
 * @phpstan-type HolidayData array{name: string, search_names: array<int, string>, date: callable(): \USHolidays\USHolidays, bank_holiday: bool, federal_holiday: bool, start_year: int|null, end_year: int|null, bank_holiday_start_year: int|null, bank_holiday_end_year: int|null, federal_holiday_start_year: int|null, federal_holiday_end_year: int|null}
 */
interface HolidayTypes {}

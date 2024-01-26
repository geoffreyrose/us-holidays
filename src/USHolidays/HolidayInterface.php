<?php

namespace USHolidays;

interface HolidayInterface
{
    //    public function __set(string $name, mixed $value): void;
    //    public function __get(string $name): mixed;
    public static function setHoliday(int $year);

    public function getHoliday(int $year);
    //    public function __call(string $name, array $arguments): mixed;
}

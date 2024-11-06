<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum WorkingDay: int
{
    use EnumFunctions;

    case FullTime = 1;
    case PartTime = 2;
    case ThreeDays = 3;
    case FourDays = 4;

    public function label(): string
    {
        return match ($this) {
            self::FullTime => 'Full Time',
            self::PartTime => 'Part Time',
            self::ThreeDays => '3 Days a Week',
            self::FourDays => '4 Days a Week',
        };
    }
}
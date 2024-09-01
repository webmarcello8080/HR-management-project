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
}
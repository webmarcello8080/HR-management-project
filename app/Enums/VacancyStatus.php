<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum VacancyStatus: int
{
    use EnumFunctions;
    
    case Active = 1;
    case Inactive = 2;
    case Completed = 3;
}
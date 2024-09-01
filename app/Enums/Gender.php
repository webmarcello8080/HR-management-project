<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum Gender: int
{
    use EnumFunctions;

    case Male = 1;
    case Female = 2;
    case Other = 3;
}
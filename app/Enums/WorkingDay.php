<?php
 
namespace App\Enums;
 
enum WorkingDay: int
{
    case FullTime = 1;
    case PartTime = 2;
    case ThreeDays = 3;
    case FourDays = 4;
}
<?php
 
namespace App\Enums;
 
enum VacancyStatus: int
{
    case Active = 1;
    case Inactive = 2;
    case Completed = 3;
}
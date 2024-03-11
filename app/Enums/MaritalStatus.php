<?php
 
namespace App\Enums;
 
enum MaritalStatus: int
{
    case Single = 1;
    case Married = 2;
    case Divorced = 3;
    case Widow = 4;
}
<?php
 
namespace App\Enums;
 
enum CandidateStatus: int
{
    case Hired = 1;
    case InProgress = 2;
    case Rejected = 3;
}
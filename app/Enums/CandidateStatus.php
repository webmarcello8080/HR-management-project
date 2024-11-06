<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum CandidateStatus: int
{
    use EnumFunctions;

    case Hired = 1;
    case InProgress = 2;
    case Rejected = 3;

    public function label(): string
    {
        return match ($this) {
            self::Hired => 'Hired',
            self::InProgress => 'In Progress',
            self::Rejected => 'Rejected',
        };
    }
}
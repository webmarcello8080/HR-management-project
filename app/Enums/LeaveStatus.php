<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum LeaveStatus: int
{
    use EnumFunctions;
    
    case Pending = 1;
    case Approved = 2;
    case Rejected = 3;

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
        };
    }

    public function colour(): string
    {
        return match ($this) {
            self::Pending => 'yellow',
            self::Approved => 'green',
            self::Rejected => 'red',
        };
    }
}
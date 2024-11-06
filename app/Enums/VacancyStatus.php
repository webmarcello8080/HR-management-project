<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum VacancyStatus: int
{
    use EnumFunctions;
    
    case Active = 1;
    case Inactive = 2;
    case Completed = 3;

    public function label(): string
    {
        return match ($this) {
            self::Active => 'Active',
            self::Inactive => 'Inactive',
            self::Completed => 'Completed',
        };
    }

    public function colour(): string
    {
        return match ($this) {
            self::Active => 'green',
            self::Inactive => 'red',
            self::Completed => 'yellow',
        };
    }
}
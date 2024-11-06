<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum MaritalStatus: int
{
    use EnumFunctions;

    case Single = 1;
    case Married = 2;
    case Divorced = 3;
    case Widow = 4;

    public function label(): string
    {
        return match ($this) {
            self::Single => 'Single',
            self::Married => 'Married',
            self::Divorced => 'Divorced',
            self::Widow => 'Widow',
        };
    }
}
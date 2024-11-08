<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum Currency: int
{
    use EnumFunctions;

    case BritishPound = 1;
    case Euro = 2;
    case USDollar = 3;
    case Yen = 4;
    case AUDollar = 5;
    case SwissFranc = 6;

    public function label(): string
    {
        return match ($this) {
            self::BritishPound => 'British Pound',
            self::Euro => 'Euro',
            self::USDollar => 'USA Dollar',
            self::Yen => 'Japanese Yen',
            self::AUDollar => 'AUS Dollar',
            self::SwissFranc => 'Swiss Franc',
        };
    }

    public function sign(): string
    {
        return match ($this) {
            self::BritishPound => '£',
            self::Euro => '€',
            self::USDollar => '$',
            self::Yen => '¥',
            self::AUDollar => '$',
            self::SwissFranc => '₣',
        };
    }
}
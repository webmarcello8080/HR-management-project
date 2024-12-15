<?php
 
namespace App\Enums;

use App\Traits\EnumFunctions;

enum DateFormat: int
{
    use EnumFunctions;

    case dmY = 1;
    case mdY = 2;
    case Ymd = 3;
    case FdY = 4;
    case MdY = 5;
    case jSFY = 6;
    case jSMY = 7;

    public function format(): string
    {
        return match ($this) {
            self::dmY => 'd-m-Y',
            self::mdY => 'm-d-Y',
            self::Ymd => 'Y-m-d',
            self::FdY => 'F d, Y',
            self::MdY => 'M d, Y',
            self::jSFY => 'jS F Y',
            self::jSMY => 'jS M Y',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::dmY => '12-15-2024',
            self::mdY => '15-12-2024',
            self::Ymd => '2024-12-15',
            self::FdY => 'December 15, 2024',
            self::MdY => 'Dec 15, 2024',
            self::jSFY => '15th December 2024',
            self::jSMY => '15th Dec 2024',
        };
    }
}
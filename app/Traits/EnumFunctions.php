<?php

namespace App\Traits;

trait EnumFunctions {

    /**
     * Transform an Enum in an array value/name or value/label if method label exists
     * [ 1 => 'Name1', 2 => 'Name2', ...]
     */
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->value] = method_exists($case, 'label') ? $case->label() : $case->name;
        }
        return $array;
    }
}
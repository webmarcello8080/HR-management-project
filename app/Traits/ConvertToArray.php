<?php

namespace App\Traits;

trait ConvertToArray {

    /**
     * generate array [ID][$field]
     */
    public static function convertToArray(string $field): array
    {
        $departments = static::class::orderBy($field)->get();

        $departmentArray = [];
        foreach($departments as $department){
            $departmentArray[$department->id] = $department->$field;
        }

        return $departmentArray;
    }
}
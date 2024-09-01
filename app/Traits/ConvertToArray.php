<?php

namespace App\Traits;

trait ConvertToArray {

    /**
     * generate array [ID][Name]
     */
    public static function getArrayName(): array
    {
        $departments = static::class::orderBy('name')->get();

        $departmentArray = [];
        foreach($departments as $department){
            $departmentArray[$department->id] = $department->name;
        }

        return $departmentArray;
    }
}
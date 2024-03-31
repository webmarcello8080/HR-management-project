<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'name'];

    protected $casts = [
        'date' => 'date'
    ];

    public static function filterByYear(int $year){
        return self::whereYear('date', $year)->orderBy('date')->get();
    }
}

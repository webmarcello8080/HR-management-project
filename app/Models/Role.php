<?php

namespace App\Models;

use App\Traits\ConvertToArray;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, ConvertToArray;

    protected $fillable = [
        'name',
    ];

    /**
     * the users of this role
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}

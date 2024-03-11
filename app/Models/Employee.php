<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Employee extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['first_name', 'last_name', 'mobile_number', 'email', 'dob', 'marital_status', 'gender', 'nationality', 'address', 'city', 'country', 'post_code'];
    protected $casts = ['marital_status' => MaritalStatus::class, 'gender' => Gender::class];

    /**
     * get the information of this Employee
     */
    public function employeeInformation(): HasOne{
        return $this->hasOne(EmployeeInformation::class);
    }

    /**
     * get the accounts of this Employee
     */
    public function employeeAccount(): HasOne{
        return $this->hasOne(EmployeeAccount::class);
    }

    /**
     * convert images before save it on server
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

    /**
     * overwrite create method based on $attribute and $image
     */
    public static function create(array $attributes = []): Employee
    {
        $employee = static::query()->create($attributes);

        if($attributes['profile_image']){
            $employee->addMedia($attributes['profile_image']->path())->toMediaCollection('profile_image');
        }

        return $employee;
    }
}

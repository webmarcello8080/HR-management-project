<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\MaritalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Employee extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'mobile_number', 'email', 'dob', 'marital_status', 'gender', 'nationality', 'address', 'city', 'country', 'post_code', 'user_id'];
    protected $casts = ['marital_status' => MaritalStatus::class, 'gender' => Gender::class];

    /**
     * get the user of this employee
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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
     * get the leaves of this employee
     */
    public function leaves(): HasMany
    {
        return $this->hasMany(Leave::class)->orderBy('from_date');
    }

    /**
     * get the attendances of this employee
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class)->orderBy('date');
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
     * get this employee image url based on image name
     */
    public function getMediaUrl(string $mediaName): string
    {
        $media = $this->getMedia($mediaName);

        if(isset($media[0])){
            return $media[0]->getUrl('thumb');
        }

        return asset('/images/placeholder.jpg');
    }

    /**
     * get this Employee Full Name
     */
    public function getFullName() : string 
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * get array with all employees full names
     */
    public static function getFullNameArray(): array
    {
        $employees = Employee::all();

        $fullNameArray = [];
        foreach($employees as $employee){
            $fullNameArray[$employee->id] = $employee->getFullName();
        }

        return $fullNameArray;
    }
}

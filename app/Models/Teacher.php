<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'teachers';

    public function course():BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function video():HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function getExperienceAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "experience_{$locale}";
        return $this->{$poperty};
    }
    public function getMajorAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "major_{$locale}";
        return $this->{$poperty};
    }
    public function getHobbyAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "hobby_{$locale}";
        return $this->{$poperty};
    }
    public function getDegreeAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "degree_{$locale}";
        return $this->{$poperty};
    }
    public function getAddressAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "address_{$locale}";
        return $this->{$poperty};
    }

}

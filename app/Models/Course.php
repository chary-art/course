<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function teachers():HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function courseAttributes():HasMany
    {
        return $this->hasMany(CourseAttribute::class);
    }

    public function getCourseAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "course_{$locale}";
        return $this->{$poperty};
    }
}

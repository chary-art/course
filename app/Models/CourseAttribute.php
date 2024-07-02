<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAttribute extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'course_attributes';
    protected $guarded = ['id'];
    public function course():BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function getStageAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "stage_{$locale}";
        return $this->{$poperty};
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "description_{$locale}";
        return $this->{$poperty};
    }
}

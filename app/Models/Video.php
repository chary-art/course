<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $guarded = ['id'];
//    protected $fillable = [
//        'title_tk', 'title_ru', 'title_en', 'video', 'teacher_id'
//    ];

    public function teacher():BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "title_{$locale}";
        return $this->{$poperty};
    }
}

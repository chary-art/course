<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'events';

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "title_{$locale}";
        return $this->{$poperty};
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "description_{$locale}";
        return $this->{$poperty};
    }

//    public function getAvatarAttribute($value)
//    {
//        if (!$value) {
//            // If 'avatar' is null, return the path to the default image
//            return asset('/public/images/profile.svg');
//        }
//
//        // Otherwise, return the actual image path
//        return $value;
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'banners';
    protected $guarded = ['id'];

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

    public function getNewsAttribute()
    {
        $locale = app()->getLocale();
        $poperty = "news_{$locale}";
        return $this->{$poperty};
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'country_id'];

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s a');
    }

    public function getUpdatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s a');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

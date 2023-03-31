<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s a');
    }

    public function getUpdatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s a');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

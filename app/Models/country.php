<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function getCreatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s a');
    }

    public function getUpdatedAtAttribute($key)
    {
        return Carbon::parse($key)->format('Y-m-d h:i:s a');
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}

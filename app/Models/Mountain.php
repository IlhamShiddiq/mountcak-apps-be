<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'city',
        'max_climber',
        'day_duration',
        'night_duration',
        'price',
        'is_open',
        'is_team_available',
        'image'
    ];

    public $incrementing = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'mountain_id',
        'leader_id',
        'member_count',
        'member_max',
        'schedule_go',
        'schedule_home'
    ];

    public $incrementing = false;
}

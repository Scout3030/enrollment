<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicPeriod extends Model
{
    use HasFactory;

    const INACTIVE = 0;
    const ACTIVE = 1;

    protected $fillable = [
        'name',
        'started_at',
        'finished_at',
        'status',
        'description',
    ];

    protected $casts = [
        'started_at' => 'datetime:d-m-Y H:i',
        'finished_at' => 'datetime:d-m-Y H:i',
    ];
}

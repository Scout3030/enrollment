<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    const MANDATORY = 1;
    const OPTIONAL = 2;

    protected $fillable = [
        'name', 'grade_id',
        'type', 'description'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}

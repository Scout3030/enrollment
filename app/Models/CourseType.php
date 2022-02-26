<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;

    const COMMON = 1;
    const COMMON_OPTIONAL = 2;
    const ELECTIVE = 3;
    const ACADEMIC = 4;
    const APPLIED = 5;
    const FREE_CONFIGURATION = 6;
    const CORE = 7;
    const SPECIFIC = 8;

    protected $fillable = ['name'];

    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }
}

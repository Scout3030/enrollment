<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;

    const MANDATORY = 1;
    const MANDATORY_OPTIONAL = 2;
    const OPTIONAL = 3;

    protected $fillable = ['name'];
}

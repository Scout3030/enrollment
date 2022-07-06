<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Grade
 *
 * @property int $id
 * @property int $level_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\GradeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Level $level
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 */
class Grade extends Model
{
    use HasFactory;

    // ESO
    const FIRST_MIDDLE_SCHOOL = 1;
    const SECOND_MIDDLE_SCHOOL = 2;
    const THIRD_MIDDLE_SCHOOL = 3;
    const FOURTH_MIDDLE_SCHOOL = 4;

    // PMAR
    const FIRST_HIGH_SCHOOL = 5;
    const SECOND_HIGH_SCHOOL = 6;
    const THIRD_HIGH_SCHOOL = 7;

    const FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY = 8;
    const FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES = 9;
    const FIRST_HIGH_SCHOOL_GENERAL = 10;
    const SECOND_HIGH_SCHOOL_SCIENCE = 11;
    const SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES = 12;

    const FIRST_EDUCATIONAL_CYCLE_BASIC = 13;
    const SECOND_EDUCATIONAL_CYCLE_BASIC = 14;
    const FIRST_EDUCATIONAL_CYCLE_MEDIUM = 15;
    const SECOND_EDUCATIONAL_CYCLE_MEDIUM = 16;

    public function getNameAttribute($value)
    {
        return __($value);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', ACTIVE);
    }
}

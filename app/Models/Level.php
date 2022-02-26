<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Level
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\LevelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Level query()
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Level whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Grade[] $grades
 * @property-read int|null $grades_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseType[] $courseTypes
 * @property-read int|null $course_types_count
 */
class Level extends Model
{
    use HasFactory;

    const MIDDLE_SCHOOL = 1;
    const HIGH_SCHOOL = 2;
    const PROFESSIONAL_TRAINING = 3;

    public function getNameAttribute($value)
    {
        return __($value);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function courseTypes()
    {
        return $this->belongsToMany(CourseType::class);
    }
}

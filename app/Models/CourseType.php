<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CourseType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Level[] $levels
 * @property-read int|null $levels_count
 * @method static \Database\Factories\CourseTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CourseType extends Model
{
    use HasFactory;

    const COMMON = 1;                      
    const COMMON_AREAS = 2;                
    const COMMON_OPTIONAL_ONE = 3;
    const COMMON_OPTIONAL_TWO = 4;
    const ELECTIVE = 5;
    const ACADEMIC = 6;
    const APPLIED = 7;
    const FREE_CONFIGURATION = 8;
    const CORE = 9;
    const SPECIFIC = 10;
    const SPECIFIC_FREE_CONFIGURATION = 11;
    const ITINERARY = 12;
    const SPECIFIC_ITINERARY = 13;
    const FREE_CONFIGURATION_ITINERARY = 14;
    const INTRO_PROFESSIONAL_TRAINING = 15;
  

    protected $fillable = ['name'];

    public function getNameAttribute($value)
    {
        return __($value);
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }
}

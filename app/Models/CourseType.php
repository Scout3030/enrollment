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
    const MODALITY = 16;
    const MODALITY_OPTION = 17;
    const CORE_MODALITY= 18;
    const CORE_MODALITY_OPTION_ONE= 19;
    const CORE_MODALITY_OPTION_TWO= 20;
    const CORE_MODALITY_OPTION_THIRD= 21;
    const CORE_MODALITY_OPTION_FOURTH= 22;
    const CORE_MODALITY_OPTION_FIVE= 23;
    const COMMON_OPTIONAL = 24;
    const ITINERARY_HUMANITIES = 25;
    const ITINERARY_SCIENCES = 26;
    const ITINERARY_HUMANITIES_OPTION = 27;
    const ITINERARY_SCIENCES_OPTION = 28;
  

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

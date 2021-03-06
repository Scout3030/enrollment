<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $grade_id
 * @property string $name
 * @property string $description
 * @property int $type
 * @property \datetime|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Grade $grade
 * @method static \Database\Factories\CourseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Query\Builder|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Course withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Course withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Enrollment[] $enrollments
 * @property-read int|null $enrollments_count
 * @property int $course_type_id
 * @property int $bilingual
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereBilingual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseTypeId($value)
 * @property int|null $duration
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDuration($value)
 * @property int|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGroup($value)
 * @property int|null $group_one
 * @property int|null $group_two
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGroupOne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGroupTwo($value)
 */
class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    const GROUP_COURSES_ONE_A = '0';
    const GROUP_COURSES_ONE_B = '1';
    const GROUP_COURSES_TWO_A = '0';
    const GROUP_COURSES_TWO_B = '1';

    protected $fillable = [
        'name',
        'grade_id',
        'course_type_id',
        'description',
        'bilingual',
        'duration',
        'group_one',
        'group_two',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class);
    }
}

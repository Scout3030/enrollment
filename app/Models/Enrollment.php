<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Enrollment
 *
 * @property int $id
 * @property int $student_id
 * @property int $grade_id
 * @property int|null $bus_stop_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EnrollmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereBusStopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereGradeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @property int $bilingual
 * @property string|null $previous_school
 * @property int $repeat_course
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereBilingual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment wherePreviousSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereRepeatCourse($value)
 * @property-read \App\Models\Grade $grade
 * @property-read \App\Models\Student $student
 * @property int $academic_period_id
 * @property string|null $student_signature
 * @property string|null $second_tutor_signature
 * @property string|null $first_tutor_signature
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereAcademicPeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereFirstTutorSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereSecondTutorSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStudentSignature($value)
 */
class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'grade_id',
        'bus_stop_id',
        'repeat_course',
        'bilingual',
        'previous_school',
        'student_signature',
        'second_tutor_signature',
        'first_tutor_signature',
        'academic_period_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('order');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}

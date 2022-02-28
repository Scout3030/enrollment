<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Student
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $country_id
 * @property string|null $middle_name
 * @property string|null $paternal_surname
 * @property string|null $maternal_surname
 * @property string|null $dni
 * @property \Illuminate\Support\Carbon|null $birth
 * @property string|null $address
 * @property string|null $address_number
 * @property string|null $door
 * @property string|null $stair
 * @property string|null $floor
 * @property string|null $letter
 * @property string|null $postal_code
 * @property string|null $first_tutor_dni
 * @property string|null $first_tutor_full_name
 * @property string|null $first_tutor_phone_number
 * @property string|null $first_tutor_email
 * @property string|null $first_tutor_address
 * @property string|null $second_tutor_dni
 * @property string|null $second_tutor_full_name
 * @property string|null $second_tutor_phone_number
 * @property string|null $second_tutor_email
 * @property string|null $second_tutor_address
 * @property bool|null $transportation
 * @property string|null $route
 * @property string|null $bus_stop
 * @property \datetime|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\StudentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAddressNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBusStop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDoor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstTutorAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstTutorDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstTutorEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstTutorFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstTutorPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMaternalSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePaternalSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSecondTutorAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSecondTutorDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSecondTutorEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSecondTutorFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSecondTutorPhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStair($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTransportation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $grade_id
 * @property string|null $bus_stop_id
 * @property-read \App\Models\BusStop|null $busStop
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBusStopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereGradeId($value)
 */
class Student extends Model
{
    use HasFactory;

    protected static function boot () {
        parent::boot();
        static::created(function (Student $student) {
            $student->user->assignRole('student');
        });
    }

    protected $fillable = [
        'user_id',
        'grade_id',
        'bus_stop_id',
        'country_id',
        'bus_stop_id',
        'middle_name',
        'paternal_name',
        'maternal_name',
        'dni',
        'birth',
        'address',
        'address_number',
        'door',
        'stair',
        'floor',
        'letter',
        'postal_code',
        'first_tutor_dni',
        'first_tutor_full_name',
        'first_tutor_phone_number',
        'first_tutor_email',
        'first_tutor_address',
        'second_tutor_dni',
        'second_tutor_full_name',
        'second_tutor_phone_number',
        'second_tutor_email',
        'second_tutor_address',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
        'birth' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function busStop()
    {
        return $this->belongsTo(BusStop::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}

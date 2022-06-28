<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AcademicPeriod
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $status
 * @property \datetime $started_at
 * @property \datetime $finished_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AcademicPeriodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicPeriod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AcademicPeriod extends Model
{
    use HasFactory;

    const INACTIVE = 0;
    const ACTIVE = 1;

    protected $fillable = [
        'name',
        'started_at',
        'level_id',
        'finished_at',
        'status',
        'description',
    ];

    protected $casts = [
        'started_at' => 'datetime:d-m-Y H:i',
        'finished_at' => 'datetime:d-m-Y H:i',
        'status' => 'boolean'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}

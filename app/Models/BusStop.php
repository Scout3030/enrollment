<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BusStop
 *
 * @property int $id
 * @property int $route_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BusStopFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop query()
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BusStop whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BusStop extends Model
{
    use HasFactory;

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\BusStop;
use App\Models\Route;
use Illuminate\Database\Seeder;

class BusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::get()->each(function (\App\Models\Route $r) {
            BusStop::factory([
                'route_id' => $r->id
            ])
                ->count(3)
                ->create();
        });
    }
}

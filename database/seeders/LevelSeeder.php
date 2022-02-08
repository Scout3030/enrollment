<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            'Middle school',
            'High school',
            'Professional training',
        ];

        foreach ($levels as $level){
            $levelExist = Level::whereName($level)->first();
            if(!$levelExist){
                Level::create(['name' => $level]);
            }
        }
    }
}

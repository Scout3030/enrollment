<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            ['name' => 'First', 'level_id' => Level::MIDDLE_SCHOOL],
            ['name' => 'Second', 'level_id' => Level::MIDDLE_SCHOOL],
            ['name' => 'Third', 'level_id' => Level::MIDDLE_SCHOOL],
            ['name' => 'Fourth', 'level_id' => Level::MIDDLE_SCHOOL],
            ['name' => 'First', 'level_id' => Level::HIGH_SCHOOL],
            ['name' => 'Second', 'level_id' => Level::HIGH_SCHOOL],
            ['name' => 'Third', 'level_id' => Level::HIGH_SCHOOL],
            ['name' => 'First', 'level_id' => Level::PROFESSIONAL_TRAINING],
            ['name' => 'Second', 'level_id' => Level::PROFESSIONAL_TRAINING],
        ];

        foreach ($grades as $grade){
            $gradeExist = Grade::whereName($grade['name'])
                ->whereLevelId($grade['level_id'])
                ->first();
            if(!$gradeExist){
                Grade::create([
                    'name' => $grade['name'],
                    'level_id' => $grade['level_id']
                ]);
            }
        }
    }
}

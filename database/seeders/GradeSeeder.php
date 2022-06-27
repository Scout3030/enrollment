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

            ['name' => 'first science technology', 'level_id' => Level::BACHELOR],
            ['name' => 'first humanities sciences', 'level_id' => Level::BACHELOR],
            ['name' => 'first general', 'level_id' => Level::BACHELOR],
            ['name' => 'second science', 'level_id' => Level::BACHELOR],
            ['name' => 'second humanities sciences', 'level_id' => Level::BACHELOR],

            ['name' => '1° FPB', 'level_id' => Level::EDUCATIONAL_CYCLE],
            ['name' => '2° FPB', 'level_id' => Level::EDUCATIONAL_CYCLE],
            ['name' => '1° CFGM', 'level_id' => Level::EDUCATIONAL_CYCLE],
            ['name' => '2° CFGM', 'level_id' => Level::EDUCATIONAL_CYCLE],
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

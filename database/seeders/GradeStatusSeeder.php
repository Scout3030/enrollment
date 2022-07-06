<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Level;
use Illuminate\Database\Seeder;

class GradeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            ['name' => 'First', 'level_id' => Level::MIDDLE_SCHOOL, 'status' => ACTIVE],
            ['name' => 'Second', 'level_id' => Level::MIDDLE_SCHOOL, 'status' => ACTIVE],
            ['name' => 'Third', 'level_id' => Level::MIDDLE_SCHOOL, 'status' => ACTIVE],
            ['name' => 'Fourth', 'level_id' => Level::MIDDLE_SCHOOL, 'status' => ACTIVE],

            ['name' => 'Primero ESO PMAR', 'level_id' => Level::HIGH_SCHOOL, 'status' => INACTIVE],
            ['name' => 'Segundo ESO PMAR', 'level_id' => Level::HIGH_SCHOOL, 'status' => ACTIVE],
            ['name' => 'Tercero ESO Diversificacion', 'level_id' => Level::HIGH_SCHOOL, 'status' => ACTIVE],

            ['name' => '1° Ciencias y Tecnología', 'level_id' => Level::BACHELOR, 'status' => ACTIVE],
            ['name' => '1° Humanidades y Ciencias Sociales', 'level_id' => Level::BACHELOR, 'status' => ACTIVE],
            ['name' => '1° General', 'level_id' => Level::BACHELOR, 'status' => ACTIVE],
            ['name' => '2° Ciencias', 'level_id' => Level::BACHELOR],
            ['name' => '2° Humanidades y Ciencias Sociales', 'level_id' => Level::BACHELOR, 'status' => ACTIVE],

            ['name' => '1° FPB', 'level_id' => Level::EDUCATIONAL_CYCLE, 'status' => ACTIVE],
            ['name' => '2° FPB', 'level_id' => Level::EDUCATIONAL_CYCLE, 'status' => ACTIVE],
            ['name' => '1° CFGM', 'level_id' => Level::EDUCATIONAL_CYCLE, 'status' => ACTIVE],
            ['name' => '2° CFGM', 'level_id' => Level::EDUCATIONAL_CYCLE, 'status' => ACTIVE],
        ];

        foreach ($grades as $grade){
            $gradeExist = Grade::whereName($grade['name'])
                ->whereLevelId($grade['level_id'])
                ->first();
            if(!$gradeExist){
                Grade::create($grade);
            } else {
                $gradeExist->fill($grade)->save();
            }
        }
    }
}

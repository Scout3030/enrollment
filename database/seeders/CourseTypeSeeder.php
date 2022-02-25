<?php

namespace Database\Seeders;

use App\Models\CourseType;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'common',
            'common optional',
            'elective',
            'academic',
            'applied',
            'free configuration',
            'core',
            'specific'
        ];

        foreach ($types as $type){
            $typeExist = CourseType::whereName($type)
                ->first();
            if(!$typeExist){
                CourseType::create([
                    'name' => $type,
                ]);
            }
        }
    }
}

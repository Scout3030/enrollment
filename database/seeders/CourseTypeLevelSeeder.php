<?php

namespace Database\Seeders;

use App\Models\CourseType;
use App\Models\Level;
use Illuminate\Database\Seeder;

class CourseTypeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $middleSchoolCourseTypes = [
            CourseType::COMMON,
            CourseType::COMMON_OPTIONAL,
            CourseType::ELECTIVE,
        ];

        $highSchoolCourseTypes = [
            CourseType::COMMON,
            CourseType::COMMON_OPTIONAL,
            CourseType::ELECTIVE,
            CourseType::ACADEMIC,
            CourseType::APPLIED,
            CourseType::FREE_CONFIGURATION,
        ];

        $professionalTrainingCourseTypes = [
            CourseType::COMMON,
            CourseType::CORE,
            CourseType::SPECIFIC,
            CourseType::FREE_CONFIGURATION,
        ];

        $levels = [
            ['name' => 'Middle school', 'course_types' => $middleSchoolCourseTypes],
            ['name' => 'High school', 'course_types' => $highSchoolCourseTypes],
            ['name' => 'Professional training', 'course_types' => $professionalTrainingCourseTypes],
        ];

        foreach ($levels as $level){
            $levelExist = Level::whereName($level['name'])->first();
            $levelExist->courseTypes()->attach($level['course_types']);
        }
    }
}

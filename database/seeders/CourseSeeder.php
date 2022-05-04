<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\Grade;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Common courses
        Course::factory()
            ->count(60)
            ->create([
                'course_type_id' => CourseType::COMMON,
            ]);

        // Religion and ethical values for all grades
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Ethical values',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Ethical values',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Ethical values',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Religion',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Ethical values',
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);

        // electives first
        Course::factory()
            ->create([
                'name' => 'French',
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Asturian language and literature',
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Healthy life',
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);

        // electives second
        Course::factory()
            ->create([
                'name' => 'Classic culture',
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Asturian language and literature',
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'French',
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Protocolo social para jovenes',
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);

        // electives third
        Course::factory()
            ->create([
                'name' => 'Classic culture',
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Asturian language and literature',
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => '(2dt foreign language) French',
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Iniciacion a la actividad emprendedora y empresarial',
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Taller de oratoria y retorica',
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);

        // electives fourth
        Course::factory()
            ->create([
                'name' => 'Artes escenicas y danza',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Cultura cientifica',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Cultura clasica',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Educacion plastica visual',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Segunda lengua extranjera, frances',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Music',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnologias de la informacion y comunicacion',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Philosophy',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ELECTIVE,
            ]);

        // academic fourth
        Course::factory()
            ->create([
                'name' => 'Biologia y geologia + fisica y quimica',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ACADEMIC,
            ]);
        Course::factory()
            ->create([
                'name' => 'Latin + economia',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ACADEMIC,
            ]);

        // applied fourth
        Course::factory()
            ->create([
                'name' => 'Ciencias aplicadas a la actividad profesional',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::APPLIED,
            ]);
        Course::factory()
            ->create([
                'name' => 'Iniciacion a la actividad emprendedora y empresarial',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::APPLIED,
            ]);

        // free configuration fourth
        Course::factory()
            ->create([
                'name' => 'Electronica, robotica y control',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Fotografia, video y creacion digital',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Lengua asturiana y su literatura',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Especifica no elegida en el cuadro anterior (indicar cual)',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
    }
}

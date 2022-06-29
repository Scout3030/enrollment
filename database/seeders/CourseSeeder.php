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

        /** 1º ESO (LOMLOE)  */
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Educación Física',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Geografía e Historia',
                'bilingual' => true,
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Lengua Castellana y Literatura',
                'duration'=>'5',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Matemáticas',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Biología y Geología',
                'bilingual' => true,
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Educación Plástica, Visual y Audiovisual',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Música',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);


        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Lengua Asturiana y Literatura I',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Digitalización Aplicada',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Religión',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FIRST_MIDDLE_SCHOOL,
                'name' => 'Atención Educativa',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);


        /** 2º ESO  */
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Geografía e Historia',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Física y Química',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Lengua Castellana y Literatura',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Matemáticas',
                'bilingual' => true,
                'duration'=>'5',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Música',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Tecnología',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Educación Física',
                'bilingual' => true,
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Valores Éticos',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Religión',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Segunda Lengua Extranjera I: Francés I',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Cultura Clásica',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_MIDDLE_SCHOOL,
                'name' => 'Lengua Asturiana',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        /** 2º ESO PMAR */

        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Ámbito Lingüístico y Social',
                'duration'=>'7',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Ámbito de Lenguas Extranjeras',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Ámbito Científico y Matemático',
                'duration'=>'9',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Música',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Tecnología',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Educación Física',
                'duration'=>'2',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Valores Éticos',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Religión',
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Cultura Clásica',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Lengua Asturiana',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Materia de Centro',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL,
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'2',
                'course_type_id' => CourseType::FREE_CONFIGURATION,
            ]);

        /** 3º ESO (LOMLOE)  */
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Educación Física',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Geografía e Historia',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Lengua Castellana y Literatura',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Matemáticas',
                'duration'=>'4',
                'course_type_id' => CourseType::COMMON,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Biología y Geología',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Educación Plástica Visual y Audiovisual',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Física y Química',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Tecnología y Digitalización',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Educación en Valores Cívicos y Éticos',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);


        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Lengua Asturiana y Literatura I',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Proyecto de Emprendimiento Social y Empresarial',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Atención Educativa',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_MIDDLE_SCHOOL,
                'name' => 'Religión',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        /**  3º ESO PROGRAMA DE DIVERSIFICACIÓN CURRICULAR I */
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Ámbito Lingüístico y Social',
                'duration'=>'9',
                'course_type_id' => CourseType::COMMON_AREAS,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Ámbito Científico-Tecnológico',
                'duration'=>'9',
                'course_type_id' => CourseType::COMMON_AREAS,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'duration'=>'3',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Educación Plástica Visual y Audiovisual',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Tecnología y Digitalización',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Educación Física',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Materia de Centro',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Lengua Asturiana y Literatura I',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Proyecto de Emprendimiento Social o Empresarial',
                'duration'=>'2',
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);

        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Religión',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::THIRD_HIGH_SCHOOL,
                'name' => 'Atención Educativa',
                'duration'=>'1',
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);


        /**  4º ESO  */
        Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Geografía e Historia',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Lengua Castellana y Literatura',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'name' => 'Educación Física',
                'bilingual' => true,
                'duration'=>'2',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Religión',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC,
            ]);
        Course::factory()
            ->create([
                'name' => 'Valores Éticos',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'duration'=>'1',
                'course_type_id' => CourseType::SPECIFIC,
            ]);

        Course::factory()
            ->create([
                'name' => 'Matemáticas Académicas',
                'duration'=>'4',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Biología y Geología',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Física y Química',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Matemáticas Académicas',
                'duration'=>'4',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Economía',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Latín',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Matemáticas Aplicadas',
                'duration'=>'4',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Ciencias Aplicadas a la Actividad Profesional',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnología',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Iniciación a la Actividad Empresarial',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::ITINERARY,
            ]);


        Course::factory()
            ->create([
                'name' => 'Artes Escénicas y Danza',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'TIC',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Educación Plástica Visual y Audiovisual',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Cultura Clásica',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);

        // free configuration fourth
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Filosofía',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Música',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Cultura Científica',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::SPECIFIC_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'duration'=>'3',
                'name' => 'Lengua Asturiana y Literatura I',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Electrónica, Robótica y Control',
                'duration'=>'3',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION_ITINERARY,
            ]);
        Course::factory()
            ->create([
                'name' => 'Fotografía, Vídeo y Creación Digital',
                'grade_id' => Grade::FOURTH_MIDDLE_SCHOOL,
                'course_type_id' => CourseType::FREE_CONFIGURATION_ITINERARY,
                'duration'=>'3',
            ]);






        /*********************** FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY  ***********************/




        Course::factory()
            ->create([
                'name' => 'Educación Física',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'2',
            ]);
        Course::factory()
            ->create([
                'name' => 'Filosofía',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'3',
            ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Castellana y Literatura',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Física y Química',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Matemáticas',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Bilogía, Geología y Ciencias Ambientales',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Dibujo Técnico I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnología e Ingeniería',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Dibujo Técnico I',
                'duration'=>'4',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnología e Ingeniería',
                'duration'=>'4',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
            ]);Course::factory()
        ->create([
            'name' => 'Ciencias Aplicadas a la Actividad Profesional',
            'duration'=>'4',
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
            'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
        ]);
        Course::factory()
            ->create([
                'name' => 'Anatomía Aplicada',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);Course::factory()
        ->create([
            'name' => 'El Legado Clásico',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);Course::factory()
        ->create([
            'name' => 'Tecnología(s) Digital(es) Aplicada(s) I (TIC)',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Asturiana y Literatura I',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Proyecto de Investigación Integrado',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Recursos Energéticos y Sostenibilidad I',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        Course::factory()
            ->create([
                'name' => 'Religión',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY,
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);



        /*****************  FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES  **************/

        Course::factory()
            ->create([
                'name' => 'Educación Física',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'2',
            ]);
        Course::factory()
            ->create([
                'name' => 'Filosofía',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'3',
            ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Castellana y Literatura',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Latín I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Historia del Mundo Contemporáneo',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Matemáticas Aplicadas a las Ciencias Sociales',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Economía',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Economía',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Griego',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Literatura Universal',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES_OPTION,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Historia del Mundo Contemporáneo',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Literatura Universal',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Griego',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES_OPTION,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Anatomía Aplicada',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);Course::factory()
        ->create([
            'name' => 'El Legado Clásico',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);Course::factory()
        ->create([
            'name' => 'Lengua Asturiana y Literatura I',
            'duration'=>'3',
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
        ]);
        Course::factory()
            ->create([
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnología(s) Digital(es) Aplicada(s) I (TIC)',
                'duration'=>'3',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        Course::factory()
            ->create([
                'name' => 'Proyecto de Investigación Integrado',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Recursos Energéticos y Sostenibilidad I',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);
        Course::factory()
            ->create([
                'name' => 'Economía',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Griego',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Literatura Universal',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Historia del Mundo Contemporáneo',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Religión',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);






        /*****************  FIRST_HIGH_SCHOOL_GENERAL  **************/

        Course::factory()
            ->create([
                'name' => 'Educación Física',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'2',
            ]);
        Course::factory()
            ->create([
                'name' => 'Filosofía',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'3',
            ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Castellana y Literatura',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Primera Lengua Extranjera I: Inglés I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Matemáticas Generales',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Literatura Universal',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Bilogía, Geología y Ciencias Ambientales',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Dibujo Técnico I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Física y Química',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnología e Ingeniería',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Latín',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Griego',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Historia del Mundo Contemporáneo',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Economía, Entrepreneurship and business activity',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::MODALITY_OPTION,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Literatura Universal',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Bilogía, Geología y Ciencias Ambientales',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Física y Química',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Tecnología e Ingeniería',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Latín',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Dibujo Técnico I',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Griego',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);
        Course::factory()
            ->create([
                'name' => 'Historia del Mundo Contemporáneo',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_ONE,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Anatomía Aplicada',
                'duration'=>'3',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);Course::factory()
        ->create([
            'name' => 'El Legado Clásico',
            'duration'=>'3',
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
        ]);Course::factory()
        ->create([
            'name' => 'Tecnología(s) Digital(es) Aplicada(s) I (TIC)',
            'duration'=>'3',
            'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
            'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            'group_one'=>Course::GROUP_COURSES_ONE_B,
            'group_two'=>Course::GROUP_COURSES_TWO_A,
        ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Asturiana y Literatura I',
                'duration'=>'3',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
            ]);
        Course::factory()
            ->create([
                'name' => 'Segunda Lengua Extranjera: Francés I',
                'duration'=>'3',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
            ]);
        Course::factory()
            ->create([
                'name' => 'Proyecto de Investigación Integrado',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
            ]);
        Course::factory()
            ->create([
                'name' => 'Recursos Energéticos y Sostenibilidad I',
                'duration'=>'1',
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL_TWO,
            ]);

        Course::factory()
            ->create([
                'name' => 'Religión',
                'duration'=>'1',
                'grade_id' => Grade::FIRST_HIGH_SCHOOL_GENERAL,
                'course_type_id' => CourseType::COMMON_OPTIONAL,
            ]);



        /************* SECOND_HIGH_SCHOOL_SCIENCE ******************************/

        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Historia de la Filosofía',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Matemáticas II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Historia de España',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Lengua Castellana y Literatura II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Primera Lengua Extranjera II: Inglés II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Biología',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Química',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_ONE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Física',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Dibujo Técnico II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_TWO,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Geología',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_THIRD,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Dibujo Técnico II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_THIRD,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Física',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FOURTH,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Química',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FOURTH,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Física',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FIVE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'name' => 'Biología',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE_MODALITY_OPTION_FIVE,
            ]);

        Course::factory()
            ->create([
                'name' => 'Tecnología Industrial II',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);

        Course::factory()
            ->create([
                'name' => 'Ciencias de la Tierra y del Medio Ambiente',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Geología',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Dibujo Técnico II',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Biología',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Imagen y Sonido',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'TIC II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Psicología',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Segunda Lengua Extranjera II: Francés II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Asturiana II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Proyecto de Investigación II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Estilo de Vida Activo',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Religión',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_SCIENCE,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);


        /************* SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES ******************************/

        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'Historia de la Filosofía',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'Primera Lengua Extranjera II: Inglés II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'Historia de España',
                'duration'=>'3',
                'course_type_id' => CourseType::CORE,
            ]);
        Course::factory()
            ->create([
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'name' => 'Lengua Castellana y Literatura II',
                'duration'=>'4',
                'course_type_id' => CourseType::CORE,
            ]);

        Course::factory()
            ->create([
                'name' => 'Latín II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Matemáticas Aplicadas a las Ciencias Sociales II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Griego II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Geografía',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Economía de la Empresa',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Historia del Arte',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'course_type_id' => CourseType::ITINERARY_HUMANITIES,
                'duration'=>'4',
            ]);


        Course::factory()
            ->create([
                'name' => 'Griego II',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_A,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Geografía',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Economía de la Empresa',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_B,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Historia del Arte',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::ITINERARY_SCIENCES,
                'duration'=>'4',
            ]);

        Course::factory()
            ->create([
                'name' => 'Imagen y Sonido',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'TIC II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Psicología',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Segunda Lengua Extranjera II: Francés II',
                'duration'=>'3',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Lengua Asturiana II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Proyecto de Investigación II',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Estilo de Vida Activo',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Religión',
                'duration'=>'1',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_B,
                'group_two'=>Course::GROUP_COURSES_TWO_B,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);


        Course::factory()
            ->create([
                'name' => 'Fundamento de Administración y Gestión',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);

        Course::factory()
            ->create([
                'name' => 'Historia de la Música y Danza',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Geografía',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Economía',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Griego II',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);
        Course::factory()
            ->create([
                'name' => 'Historia del Arte',
                'duration'=>'4',
                'grade_id' => Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES,
                'group_one'=>Course::GROUP_COURSES_ONE_A,
                'group_two'=>Course::GROUP_COURSES_TWO_A,
                'course_type_id' => CourseType::SPECIFIC_FREE_CONFIGURATION,
            ]);

        // 1 FPB
        Course::factory()
            ->create([
                'name' => 'Técnicas Elementales de Servicio',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos Básicos de Preparación de Alimentos y Bebidas',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 5,
            ]);
        Course::factory()
            ->create([
                'name' => 'Preparación y Montaje de Materiales para Colectividades y Catering',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 4,
            ]);

        Course::factory()
            ->create([
                'name' => 'Ciencias Aplicadas I',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Comunicación y Sociedad I',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);

        Course::factory()
            ->create([
                'name' => 'FCT: Formación en Centros de Trabajo',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 120,
            ]);
        Course::factory()
            ->create([
                'name' => 'Unidad Formativa Prevención de Riesgos Laborales',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 2,
            ]);
        // END 1 FPB

        // 2 FPB
        Course::factory()
            ->create([
                'name' => 'Técnicas Elementales de Preelaboración',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 5,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos Básicos de Producción Culinaria',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Aprovisionamiento y Conservación de Materias Primas e Higiene en la Manipulación',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 4,
            ]);
        Course::factory()
            ->create([
                'name' => 'Atención al Cliente',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_UNITS_OF_COMPETENCES,
                'duration' => 2,
            ]);

        Course::factory()
            ->create([
                'name' => 'Ciencias Aplicadas II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);
        Course::factory()
            ->create([
                'name' => 'Comunicación y Sociedad II',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::ASSOCIATED_COMMON_BLOCKS,
                'duration' => 6,
            ]);

        Course::factory()
            ->create([
                'name' => 'Formación en Centros de Trabajo I',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_BASIC,
                'course_type_id' => CourseType::FORMATION_WORKSPACE,
                'duration' => 120,
            ]);
        // END 2 FPB

        // 1 CFGM
        Course::factory()
            ->create([
                'name' => 'Preelaboración y Conservación de Alimentos',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 320,
            ]);
        Course::factory()
            ->create([
                'name' => 'Técnicas Culinarias',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 256,
            ]);
        Course::factory()
            ->create([
                'name' => 'Procesos Básicos de Pastelería y Repostería',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 192,
            ]);
        Course::factory()
            ->create([
                'name' => 'Seguridad e Higiene en la Manipulación de Alimentos',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 96,
            ]);
        Course::factory()
            ->create([
                'name' => 'Formación y Orientación Laboral',
                'grade_id' => Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 96,
            ]);
        // END 1 CFGM

        // 2 CFGM
        Course::factory()
            ->create([
                'name' => 'Ofertas Gastrónomicas',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 66,
            ]);
        Course::factory()
            ->create([
                'name' => 'Productos Culinarios',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 308,
            ]);
        Course::factory()
            ->create([
                'name' => 'Postres en Restauración',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 198,
            ]);
        Course::factory()
            ->create([
                'name' => 'Empresa e Iniciativa Emprendedora',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 88,
            ]);
        Course::factory()
            ->create([
                'name' => 'Formación en Centros de Trabajo',
                'grade_id' => Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM,
                'course_type_id' => CourseType::CF_COMMON,
                'duration' => 380,
            ]);
        // END 2 CFGM
    }
}

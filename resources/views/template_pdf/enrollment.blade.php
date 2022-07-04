<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Datos</title>
    <!-- Bootstrap CSS -->
    <style type="text/css">
        .tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
        .tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}

        .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
        .tftable tr:hover {background-color:#ffffff;}
        .tfstable tr {background-color:#d4e3e5;}
    </style>
</head>
<body>
<center>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>
                    @if ($enrollment->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL)
                        MARTRÍCULA 1° ESO
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL)
                        MARTRÍCULA 2º ESO
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL)
                        MARTRÍCULA 3º ESO (LOMLOE)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL)
                        MARTRÍCULA 2º ESO PMAR
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
                        MARTRÍCULA 3º ESO PROGRAMA DE DIVERSIFICACIÓN CURRICULAR I
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                        MARTRÍCULA 4º ESO
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY)
                        GRADO 1° BACHILLERATO CIENCIAS Y TECNOLOGÍA (LOMLOE)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES)
                        GRADO 1° BACHILLERATO HUMANIDADES Y CIENCIAS SOCIALES (LOMLOE)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_GENERAL)
                        GRADO 1° BACHILLERATO GENERAL (LOMLOE)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL_SCIENCE)
                        GRADO 2° BACHILLERATO CIENCIAS (LOMCE)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES)
                        GRADO 2° BACHILLERATO HUMANIDADES Y CIENCIAS SOCIALES (LOMCE)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::FIRST_EDUCATIONAL_CYCLE_BASIC)
                        GRADO 1° CICLO FORMATIVO DE GRADO BÁSICO COCINA Y RESTAURACIÓN (HOT-101)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::SECOND_EDUCATIONAL_CYCLE_BASIC)
                        GRADO 2° CICLO FORMATIVO DE GRADO BÁSICO COCINA Y RESTAURACIÓN (HOT-101)
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM)
                        GRADO 1° CICLO FORMATIVO GRADO MEDIO COCINA Y RESTAURACIÓN
                    @endif
                    @if ($enrollment->grade->id == App\Models\Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM)
                        GRADO 2° CICLO FORMATIVO GRADO MEDIO COCINA Y RESTAURACIÓN
                    @endif
                </h2>
                <h4>IES Leopoldo Alas Clarín</h4>
            </div>
        </div>
    </div>
</center>
<div class="row">
    <div class="col-md-12">
        <table class="tftable" border="1">
            <tr><td colspan="6">APELLIDOS Y NOMBRES DEL ALUMNO/A: {{  $enrollment->student->user->full_name }}</td></tr>
            <tr><td colspan="2">DNI: {{  $enrollment->student->dni }}</td><td colspan="2">FECHA DE NACIMIENTO: {{ ( $enrollment->student->birth)->toDateString() }}</td><td colspan="2">NACIONALIDAD:  {{ $enrollment->student->user->student->country ? $enrollment->student->user->student->country->name : '-' }}</td></tr>
            <tr><td colspan="6">DIRECCIÓN POSTAL (Localidad y Calle / Ave. / Plaza): {{  $enrollment->student->address }}, Calle {{ $enrollment->student->address_number }}</td></tr>
            <tr><td colspan="3">DATOS TUTOR/A 1: Apellidos y nombre: {{  $enrollment->student->first_tutor_full_name }}</td><td colspan="3" style="background-color:#d4e3e5;">DATOS TUTOR/A 2: Apellidos y nombre: {{  $enrollment->student->second_tutor_full_name }}</td></tr>
            <tr><td colspan="1">DNI: {{  $enrollment->student->first_tutor_dni }}<td colspan="2">Teléfono: {{  $enrollment->student->first_tutor_phone_number }}</td><td colspan="1">DNI: {{  $enrollment->student->second_tutor_dni }}</td><td colspan="2">Télefono: {{  $enrollment->student->second_tutor_phone_number }}</tr>
            <tr><td colspan="3">Domicilio: {{  $enrollment->student->first_tutor_address }}</td><td colspan="3">Domicilio: {{  $enrollment->student->second_tutor_address }}</td></tr>
            @if($enrollment->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL || $enrollment->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL
                || $enrollment->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL || $enrollment->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL
                || $enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL || $enrollment->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL
                || $enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL )
                <tr><td colspan="6">SOLICITA TRANSPORTE: @if($enrollment->student->bus_stop_id) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif</td></tr>
                <tr><td colspan="3">Ruta solicitada:  @if($enrollment->student->bus_stop_id){{  $enrollment->student->busStop->route->id }}@else   --- @endif</td><td colspan="3">Parada solicitada: @if($enrollment->student->bus_stop_id){{  $enrollment->student->busStop->name }}@else   --- @endif</td></tr>
                @foreach ( App\Models\Route::all() as $route )
                    <tr><td colspan="6">{{ $route->id }}. {{  $route->name  }}</td></tr>
                @endforeach
                <tr style="background-color:#d4e3e5;"><td colspan="4">BILINGÜE INGLÉS: Materias marcadas con *</td><td colspan="2"> @if($enrollment->bilingual) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif</td></tr>
            @endif
            <tr><td colspan="2">REPITE CURSO: @if($enrollment->repeat_course) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif</td><td colspan="4">COLEGIO DE PROCEDENCIA: {{  $enrollment->previous_school }}</td></tr>
            @if ($enrollment->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS COMUNES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL_ONE == $course->course_type_id)
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIA OPTATIVA (Seleccionada)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">TRONCALES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CORE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ESPECÍFICAS (Obligatorias)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ESPECÍFICA (Seleccionada)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">LIBRE CONFIGURACIÓN (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::FREE_CONFIGURATION == $course->course_type_id)
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">TRONCALES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CORE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ESPECÍFICAS (Obligatorias)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ESPECÍFICA (Seleccionada)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">LIBRE CONFIGURACIÓN (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::FREE_CONFIGURATION == $course->course_type_id)
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS COMUNES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL_ONE == $course->course_type_id)
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIA OPTATIVA (Seleccionada)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ÁMBITOS COMUNES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_AREAS == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS COMUNES (Obligatorias)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL_ONE == $course->course_type_id)
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIA OPTATIVA (Seleccionada)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSOS TRONCALES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CORE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSO ESPECÍFICO (Seleccionado)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSOS ITINERARIOS</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ITINERARY == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSOS ESPECÍFICOS ITINERARIOS (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC_ITINERARY == $course->course_type_id)
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSOS LIBRE CONFIGURACIÓN ITINERARIOS (Númeradas por orden de preferencia)</td></tr>
                @foreach ( $enrollment->courses->where('course_type_id', App\Models\CourseType::FREE_CONFIGURATION_ITINERARY) as $course )
                    @if ($enrollment->free_info_order == ($loop->iteration))
                    <tr><td colspan="6">{{ $enrollment->free_info_order }}. {{ $enrollment->free_info ? __($enrollment->free_info) : '---' }} <strong>(Materia específica del bloque anterior) </strong></td></tr>
                    @endif
                    <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                @endforeach
                @if ($enrollment->courses->where('course_type_id', App\Models\CourseType::FREE_CONFIGURATION_ITINERARY)->count() + 1 == $enrollment->free_info_order)
                <tr><td colspan="6">{{ $enrollment->free_info_order }}. {{ $enrollment->free_info ? __($enrollment->free_info) : '---' }} <strong>(Materia específica del bloque anterior) </strong></td></tr>
                @endif
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY ||
                $enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_GENERAL)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS COMUNES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS DE MODALIDAD (Seleccionado)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::MODALITY == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::MODALITY_OPTION == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif

                @endforeach

                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS</td></tr>
                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::COMMON_OPTIONAL_ONE == $course->course_type_id)
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('4H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach


                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_A ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('3H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif

                @endforeach
                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_B ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('1H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif

                @endforeach

                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL == $course->course_type_id)
                        <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS</td></tr>
                        <tr><td colspan="6"> {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach

            @endif
            @if ($enrollment->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS COMUNES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ITINERARIOS (Seleccionado)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ITINERARY_HUMANITIES == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::ITINERARY_SCIENCES == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::ITINERARY_HUMANITIES_OPTION == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::ITINERARY_SCIENCES_OPTION == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif

                @endforeach

                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS</td></tr>
                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::COMMON_OPTIONAL_ONE == $course->course_type_id)
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('4H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach


                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_A ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('3H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif

                @endforeach
                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::COMMON_OPTIONAL_TWO == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_B ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('1H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif

                @endforeach

                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::COMMON_OPTIONAL == $course->course_type_id)
                        <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS OPTATIVAS</td></tr>
                        <tr><td colspan="6"> {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL_SCIENCE)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSOS TRONCALES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CORE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">TRONCALES DE MODALIDAD (Seleccionado)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CORE_MODALITY_OPTION_ONE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::CORE_MODALITY_OPTION_TWO == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::CORE_MODALITY_OPTION_THIRD == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::CORE_MODALITY_OPTION_FOURTH == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::CORE_MODALITY_OPTION_FIVE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach

                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ESPECÍFICOS Y LIBRE CONFIGURACIÓN</td></tr>
                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id &&
                    App\Models\Course::GROUP_COURSES_ONE_A ==  $course->group_one &&
                        App\Models\Course::GROUP_COURSES_TWO_A ==  $course->group_two)
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('4H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach


                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_A ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('3H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif

                @endforeach
                @foreach ( $enrollment->courses as $course )

                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_B ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('1H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif

                @endforeach

            @endif
            @if ($enrollment->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">CURSOS TRONCALES</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CORE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ITINERARIOS (Seleccionado)</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ITINERARY_HUMANITIES == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                    @if(App\Models\CourseType::ITINERARY_SCIENCES == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">ESPECÍFICOS Y LIBRE CONFIGURACIÓN</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id &&
                    App\Models\Course::GROUP_COURSES_ONE_A ==  $course->group_one &&
                        App\Models\Course::GROUP_COURSES_TWO_A ==  $course->group_two)
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('4H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach


                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_A ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('3H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach

                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::SPECIFIC_FREE_CONFIGURATION == $course->course_type_id &&
                       App\Models\Course::GROUP_COURSES_ONE_B ==  $course->group_one &&
                       App\Models\Course::GROUP_COURSES_TWO_B ==  $course->group_two )
                        @if($course->pivot->order==1)
                            <tr><td colspan="6"><h5>{{ __('1H COURSES') }}</h5></td></tr>
                        @endif
                        <tr><td colspan="6">{{ $course->pivot->order }}. {{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::FIRST_EDUCATIONAL_CYCLE_BASIC)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('MODULES ASSOCIATED WITH UNITS OF COMPETENCE') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ASSOCIATED_UNITS_OF_COMPETENCES == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('MODULES ASSOCIATED WITH COMMON BLOCKS') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ASSOCIATED_COMMON_BLOCKS == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('TRAINING MODULES IN WORK CENTERS') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::FORMATION_WORKSPACE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::SECOND_EDUCATIONAL_CYCLE_BASIC)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('MODULES ASSOCIATED WITH UNITS OF COMPETENCE') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ASSOCIATED_UNITS_OF_COMPETENCES == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('MODULES ASSOCIATED WITH COMMON BLOCKS') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::ASSOCIATED_COMMON_BLOCKS == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('TRAINING MODULES IN WORK CENTERS') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::FORMATION_WORKSPACE == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif

            @if ($enrollment->grade->id == App\Models\Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM)

                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('courses required') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CF_COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif
            @if ($enrollment->grade->id == App\Models\Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM)
                <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">{{ __('courses required') }}</td></tr>
                @foreach ( $enrollment->courses as $course )
                    @if(App\Models\CourseType::CF_COMMON == $course->course_type_id)
                        <tr><td colspan="6">{{ __($course->name) }}</td></tr>
                    @endif
                @endforeach
            @endif

            <tr>
                <td colspan="6">(A propuesta del equipo docente del centro de Primaria y/o del IES se puede cursar en este bloque &nbsp &nbsp<strong>REFUERZO EDUCATIVO DE LAS COMPETENCIAS MATEMÁTICAS Y/O LINGÜÍSTICA)</strong></td>
            </tr>
            <tr>
                <td colspan="3">Fecha:  {{ $enrollment->created_at->format('d-m-Y') }}</td>
                <td align="center">Alumno/a</td>
                <td  align="center">Tutor 1</td>
                <td  align="center">Tutor 2</td>
            </tr>
            <tr>
                <td colspan="3">Firma:</td>
                <td width="25%">
                    @if($enrollment->student_signature)
                        <img src="{{ asset('storage/signatures/'.$enrollment->student_signature) }}" width="100px" height="100px" >
                    @endif
                </td>
                <td width="25%">
                    @if($enrollment->first_tutor_signature)
                        <img src="{{ asset('storage/signatures/'.$enrollment->first_tutor_signature) }}" width="100px" height="100px">
                    @endif
                </td>
                <td width="25%">
                    @if($enrollment->second_tutor_signature)
                        <img src="{{ asset('storage/signatures/'.$enrollment->second_tutor_signature) }}" width="100px" height="100px">
                    @endif
                </td>
            </tr>
        </table>
        <center><h5>IES Leopoldo Alas Clarín </h5></center>
        <center><h6><u>leopoldo@educastur.org</u> Tel: 985 20 75 54 Fax: 985 21 08 68</h6></center>
    </div>
</div>
</body>
</html>

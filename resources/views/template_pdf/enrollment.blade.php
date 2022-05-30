<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 PDF</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
        <center>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <h2>MARTRICULA 1° ESO</h2>
                    <h4>IES Leopoldo Alas Clarín</h4>
                </div>
        </div>
        </center>
        <div class="row">
            <div class="col-md-12">
                            <style type="text/css">
            .tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #729ea5;border-collapse: collapse;}
            .tftable th {font-size:12px;background-color:#acc8cc;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;text-align:left;}
           
            .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #729ea5;}
            .tftable tr:hover {background-color:#ffffff;}
             .tfstable tr {background-color:#d4e3e5;}
            </style>

            <table class="tftable" border="1">
           
            <tr><td colspan="6">APELLIDOS Y NOMBRES DEL ALUMNO/A: {{  $enrollment->student->user->full_name }}</td></tr>
            <tr><td colspan="2">DNI: {{  $enrollment->student->dni }}</td><td colspan="2">FECHA DE NACIMIENTO: {{ ( $enrollment->student->birth)->toDateString(); }}</td><td colspan="2">NACIONALIDAD:</td></tr>
            <tr><td colspan="6">DIRECCIÓN POSTAL (Localidad y Calle / Ave. / Plaza): {{  $enrollment->student->address }}, Calle {{ $enrollment->student->address_number }}</td></tr>
            <tr><td colspan="3">DATOS TUTOR/A 1: Apellidos y nombre: {{  $enrollment->student->first_tutor_full_name }}</td><td colspan="3" style="background-color:#d4e3e5;">DATOS TUTOR/A 2: Apellidos y nombre: {{  $enrollment->student->second_tutor_full_name }}</td></tr>
            <tr><td colspan="1">DNI: {{  $enrollment->student->first_tutor_dni }}<td colspan="2">Teléfono: {{  $enrollment->student->first_tutor_phone_number }}</td><td colspan="1">DNI: {{  $enrollment->student->second_tutor_dni }}</td><td colspan="2">Télefono: {{  $enrollment->student->second_tutor_phone_number }}</tr>
            <tr><td colspan="3">Domicilio: {{  $enrollment->student->first_tutor_address }}</td><td colspan="3">Domicilio: {{  $enrollment->student->second_tutor_address }}</td></tr>
            <tr><td colspan="6">SOLICITA TRANSPORTE: @if($enrollment->student->bus_stop_id) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif</td></tr>
            <tr><td colspan="3">Ruta solicitada:  @if($enrollment->student->bus_stop_id){{  $enrollment->student->busStop->route->id }}@endif</td><td colspan="3">Parada solicitada: @if($enrollment->student->bus_stop_id){{  $enrollment->student->busStop->name }}@endif</td></tr>
            @foreach ( App\Models\Route::all() as $route )
            <tr><td colspan="6">{{ $route->id }}. {{  $route->name  }}</td></tr>
            @endforeach
            <tr style="background-color:#d4e3e5;"><td colspan="4">BILINGUE INGLES: Materias marcadas con *</td><td colspan="2"> @if($enrollment->bilingual) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif</td></tr>
            <tr><td colspan="2">REPITE CURSO: @if($enrollment->repeat_course) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif</td><td colspan="4">COLEGIO DE PROCEDENCIA: {{  $enrollment->previous_school }}</td></tr>
             <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">MATERIAS COMUNES</td></tr>
             @foreach ( $enrollment->courses as $course )
             @if(App\Models\CourseType::COMMON == $course->course_type_id)
            <tr><td colspan="6">{{ $course->name }}</td></tr>@endif
            @endforeach
             <tr align="center"  style="background-color:#d4e3e5;"><td colspan="6">OPTATIVA (Númerar por orden de preferencia)</td></tr>
             @foreach ( $enrollment->courses as $course )
             @if(App\Models\CourseType::COMMON_OPTIONAL == $course->course_type_id)
            <tr><td colspan="6">{{ $course->name }}</td></tr>@endif
            @endforeach
            <tr><td colspan="6">(A propuesta del equipo docente del centro de Primaria y/o del IES se puede cursar en este bloque <b> REFUERZO EDUCATIVO DE LAS COMPETENCIAS MATEMÁTICAS Y/O LINGUISTICA)</b></td></tr>
            <tr><td colspan="3">Fecha:</td><td align="center">Alumno/a</td  align="center"><td>Tutor 1</td><td  align="center">Tutor 2</td></tr>
            <tr><td colspan="3">Firma:</td><td></td><td></td><td></td></tr>
            </table>
             <center><h5>IES Leopoldo Alas Clarín</h5></center>
              <center><h6><u>leopoldo@educastur.org</u> Tel: 985 20 75 54 Fax: 985 21 08 68</h6></center>


            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
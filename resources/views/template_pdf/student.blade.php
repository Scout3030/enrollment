<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Student') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<center>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ __('DATA SHEET AND PERMITS') }}</h2>
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
        <table class="tftable" border="2">
            <tr align="center" style="background-color:#d4e3e5;"><td colspan="8"><b> {{ __('STUDENT DATA') }} </b></td></tr>
            <tr><td colspan="3">APELLIDOS Y NOMBRES DEL ALUMNO/A:</td><td colspan="5">{{  $student->user->full_name }}</td></tr>
            <tr><td colspan="2">CURSO EN EL QUE SE MATRICULA:</td><td colspan="6">
                    @if ($student->grade->id == App\Models\Grade::FIRST_MIDDLE_SCHOOL)
                        GRADO 1° ESO
                    @endif
                    @if ($student->grade->id == App\Models\Grade::SECOND_MIDDLE_SCHOOL)
                        GRADO 2º ESO
                    @endif
                    @if ($student->grade->id == App\Models\Grade::THIRD_MIDDLE_SCHOOL)
                        GRADO 3º ESO (LOMLOE)
                    @endif
                    @if ($student->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL)
                        GRADO 2º ESO PMAR
                    @endif
                    @if ($student->grade->id == App\Models\Grade::THIRD_HIGH_SCHOOL)
                        GRADO 3º ESO PROGRAMA DE DIVERSIFICACIÓN CURRICULAR I
                    @endif
                    @if ($student->grade->id == App\Models\Grade::FOURTH_MIDDLE_SCHOOL)
                        GRADO 4º ESO
                    @endif

                     @if ($student->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_SCIENCE_TECHNOLOGY)
                        GRADO 1° BACHILLERATO CIENCIAS Y TECNOLOGÍA (LOMLOE)
                      @endif
                    @if ($student->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_HUMANITIES_SCIENCES)
                        GRADO 1° BACHILLERATO HUMANIDADES Y CIENCIAS SOCIALES (LOMLOE)
                     @endif
                    @if ($student->grade->id == App\Models\Grade::FIRST_HIGH_SCHOOL_GENERAL)
                        GRADO 1° BACHILLERATO GENERAL (LOMLOE)
                     @endif
                    @if ($student->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL_SCIENCE)
                        GRADO 2° BACHILLERATO CIENCIAS (LOMCE)
                     @endif
                    @if ($student->grade->id == App\Models\Grade::SECOND_HIGH_SCHOOL_HUMANITIES_SCIENCES)
                        GRADO 2° BACHILLERATO HUMANIDADES Y CIENCIAS SOCIALES (LOMCE)
                     @endif
                    @if ($student->grade->id == App\Models\Grade::FIRST_EDUCATIONAL_CYCLE_BASIC)
                        GRADO 1° CICLO FORMATIVO DE GRADO BÁSICO COCINA Y RESTAURACIÓN (HOT-101)
                     @endif
                    @if ($student->grade->id == App\Models\Grade::SECOND_EDUCATIONAL_CYCLE_BASIC)
                        GRADO 2° CICLO FORMATIVO DE GRADO BÁSICO COCINA Y RESTAURACIÓN (HOT-101)
                     @endif
                    @if ($student->grade->id == App\Models\Grade::FIRST_EDUCATIONAL_CYCLE_MEDIUM)
                        GRADO 1° CICLO FORMATIVO GRADO MEDIO COCINA Y RESTAURACIÓN
                     @endif
                    @if ($student->grade->id == App\Models\Grade::SECOND_EDUCATIONAL_CYCLE_MEDIUM)
                         GRADO 2° CICLO FORMATIVO GRADO MEDIO COCINA Y RESTAURACIÓN
                     @endif
                </td>
            </tr>
            <tr><td colspan="1">DNI:</td>
                <td colspan="1">{{  $student->dni }}</td>
                <td colspan="2">NACIONALIDAD:</td>
                <td colspan="4">  {{ $student->user->student->country ? $student->user->student->country->name : '-' }}</td>
            </tr>
            <tr><td colspan="1">FECHA DE NACIMIENTO:</td>
                <td colspan="1"> {{ $student->birth ? ($student->birth)->toDateString() : '-' }}</td>
                <td colspan="3">LUGAR DE NACIMIENTO:</td>
                <td colspan="3">  {{ $student->user->student->country ? $student->user->student->country->name : '-' }}</td>
            </tr>
            <tr><td colspan="1">DOMICILIO ACTUAL:</td>
                <td colspan="7">{{  $student->address }}, Calle {{ $student->address_number }}</td>
            </tr>
            <tr><td colspan="1">TELEFONOS PARA URGENCIAS:</td>
                <td colspan="7"></td>
            </tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr align="center" style="background-color:#d4e3e5;"><td colspan="4">DATOS TUTOR/A 1:</td><td colspan="4">DATOS TUTOR/A 2:</td></tr>
            <tr><td colspan="4">Apellidos y nombre:</td> <td colspan="4">Apellidos y nombre: </td></tr>
            <tr><td colspan="4">{{  $student->first_tutor_full_name }}</td><td colspan="4">{{  $student->second_tutor_full_name }}</td></tr>
            <tr><td colspan="2">DNI</td> <td colspan="2">Teléfono</td> <td colspan="2">DNI</td> <td colspan="2">Teléfono</td></tr>
            <tr><td colspan="2">{{  $student->first_tutor_dni }}</td><td colspan="2">{{  $student->first_tutor_phone_number }}</td><td colspan="2">{{  $student->second_tutor_dni }}</td><td colspan="2">{{  $student->second_tutor_phone_number }}</td></tr>
            <tr><td colspan="4">Correo electrónico</td> <td colspan="4" >Correo electrónico</td></tr>
            <tr><td colspan="4">{{  $student->first_tutor_email }}</td><td colspan="4"> {{  $student->second_tutor_email }}</td></tr>
            <tr><td colspan="4">Domicilio: </td><td colspan="4">Domicilio</td></tr>
            <tr><td colspan="4">{{  $student->first_tutor_address }}</td><td colspan="4"> {{  $student->second_tutor_address }}</td></tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr align="center" style="background-color:#d4e3e5;"><td colspan="8"><b>MECANISMO DE COMUNICACIÓN Y USO DE IMÁGENES CON FINES EDUCATIVOS:</b></td></tr>
            <tr><td colspan="5">Autorizo el envio alos padres/madres/tutores/as de notificación mediante <b>APLICACIÓN TOKAPP ( indicar teléfono en el que tiene instalada la aplicación y en el que recibirá las comunicaciones ): </b> </td>
                <td colspan="3" rowspan="2"> @if($student->authorization_tokapp) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif </td></tr>
            <tr><td colspan="1">N° de teléfono:</td><td colspan="4">@if($student->authorization_tokapp) {{ $student->authorization_phone }} @else -- @endif</td></tr>
            <tr><td colspan="5">Autorizo el envio alos padres/madres/tutores/as de notificación mediante <b>SMS/CORREO ELECTRONICO</b> </td>   <td colspan="3">@if($student->authorization_electronics) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif   </td> </tr>
            <tr><td colspan="5">Autorizo la utilización de datos e imágenes en la <b>PAGINA WEB</b> u otra publicaciones educativas del centro: </td>   <td colspan="3">@if($student->authorization_data) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif   </td> </tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr align="center" style="background-color:#d4e3e5;"><td colspan="8"><b>AUTORIZACION PARA ACTIVIDADES EXTRAESCOLARES Y COMPLEMENTARIAS:</b></td></tr>
            <tr><td colspan="5">Autorizo a mi hijo a participar en <b>actividades extraescolares y complementarias</b> <u> en el exterior del centro, en horario escolar,</u> programadas por el IES Leopoldo Alas Clarin, <b> sin coste econónomico </b> (el centro informará de ello mediante los medios citados en el apartado anterior) </td>   <td colspan="3">@if($student->authorization_extracurricular) Si <input type="checkbox" name="si" checked> No <input name="no" type="checkbox"> @else Si <input name="si1" type="checkbox"> No <input type="checkbox" name="no1"  checked> @endif   </td> </tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr style="background-color:#d4e3e5;"><td colspan="8"><center><b>PADRES/MADRES SEPARADOS</b> (sólo contestar familias en esta situación)</center><br>
                    Es obligación de los padres/madres comunicar al centro, durante el proceso de matricula a lo largo del curso escolar, las circustancia de separación o no convivencia de los progenitores, asi como la de aportar la sentencia judicial correspondiente en la que haya un pronunciamiento acerca de la titularidad y el ejercicio de la patria potestad. Asimismo, es obligatorio comunicar al centro cualquier incidencia que altere o modifique dicha situacion legal.
                    Declaro la necesidad de enviar las comunicaciones alas siguientes direcciones.
                </td></tr>
            <tr  align="center">
                <td colspan="1">Tutor/A 1 </td> <td colspan="1"><input type="checkbox" name="si" ></td>
                <td colspan="1">Tutor/A 2 </td> <td colspan="1"><input type="checkbox" name="si" ></td>
                <td colspan="1">A ambos </td> <td colspan="1"><input type="checkbox" name="si" ></td>
                <td colspan="1">Aporta documentación </td>   <td colspan="1">Si <input type="checkbox" name="si" > No <input name="no" type="checkbox">  </td> </tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr align="center" style="background-color:#d4e3e5;"><td colspan="8"><b>LAERGIAS Y OTROS DATOS MÉDICOS RELEVANTES DEL ALUMNO/A</b></td></tr>
            <tr><td  colspan="1" rowspan="2">ÁLERGICO/A</td><td  colspan="1" rowspan="2">Si <input type="checkbox" name="si" > No <input name="no" type="checkbox"></td><td colspan="6">En caso afirmativo, especificar la alergia:  </td></tr>
            <tr><td colspan="6"> </td></tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr align="center" style="background-color:#d4e3e5;"><td colspan="8"><b>FIRMAS AUTORIZADAS</b> (Solo para quien tenga firma digital, el resto lo foirmarán al comienzo del curso)</td></tr>
            <tr><td  colspan="3">Tutor 1: </td><td  colspan="3">Tutor 2:</td><td colspan="2">Fecha:  </td></tr>
            <tr><td  colspan="3"> </td><td  colspan="3"></td><td colspan="2"> </td></tr>
        </table>
        <br>
        <table class="tftable" border="2">
            <tr style="background-color:#d4e3e5;"><td colspan="8"><b>PROTECCION DE DATOS</b></td></tr>
            <tr><td  colspan="3">Actividad de tratamiento: </td><td  colspan="5">Registro de datos para la tutoria y gestión educativa del centro.  </td></tr>
            <tr><td  colspan="3">Identidad del responsable del tratamiento: </td><td  colspan="5">Dirección del IES Leopoldo Alas Clarin.  </td></tr>
            <tr><td  colspan="3">Finalidad: </td><td  colspan="5">Los datos personales recabados a través del presente formulario seran tratados confidencialmente para la labor tutorial y la actividad docente y educativa del centro.  </td></tr>
            <tr><td  colspan="3">Legitimación: </td><td  colspan="5">Cumplimiento de una tarea realizada en el ejercicio de un servicio publico.  </td></tr>
            <tr><td  colspan="3">Destinatario de ceciones: </td><td  colspan="5">Tutor/a, equipo docente, equipo directivo y Dpto. de Orientación del IES Leopoldo Alas Clarin. </td></tr>
            <tr><td  colspan="3">Derechos: </td><td  colspan="5">Puede ejercer los derechos de acceso, rectificación, supresión, oposición, limitación del tratamiento y portabilidad, solicitandolo a traves de la secretaria del  IES Leopoldo Alas Clarin. Puede solicitar información adicional dirigiendose al delegado de protección de datos: delegadoprotecciondatos@asturias.org  </td></tr>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

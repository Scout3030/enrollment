<?php

namespace App\Imports;

use App\Models\Level;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\User;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToCollection, WithChunkReading, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            $headers = $row->toArray();
            if(!array_key_exists('email', $headers) || !array_key_exists('dni', $headers)
                || !array_key_exists('nombre', $headers) || !array_key_exists('nivel', $headers)
                || !array_key_exists('grado', $headers )|| !array_key_exists('estado', $headers)){
                throw ValidationException::withMessages([__('Invalid excel format, please import a valid file.')]);
            }

            $levels = [
                'ESO' => Level::MIDDLE_SCHOOL,
                'PMAR' => Level::HIGH_SCHOOL
            ];

            $grades = [
                1 => 'First',
                2 => 'Second',
                3 => 'Third',
                4 => 'Fourth',
            ];

            $statuses = [
                'INACTIVO' => User::INACTIVE,
                'ACTIVO' => User::ACTIVE,
            ];

            if(!array_key_exists($row['nivel'], $levels)) {
                throw ValidationException::withMessages([__('Invalid levels, please import a valid content')]);
            }

            if(!array_key_exists($row['grado'], $grades)) {
                throw ValidationException::withMessages([__('Invalid grades, please import a valid content')]);
            }

            if(!array_key_exists($row['estado'], $statuses)) {
                throw ValidationException::withMessages([__('Invalid statuses, please import a valid content')]);
            }

            $levelId = $levels[$row['nivel']];
            $gradeName = $grades[$row['grado']];

            $grade = Grade::whereName($gradeName)
                ->whereLevelId($levelId)
                ->first();

            if(!$grade) {
                throw ValidationException::withMessages([__('Invalid grade by level, please import a valid content')]);
            }

            $user = User::whereEmail($row['email'])->first();

            if ($user) {
                $user->update([
                    'email' => $row['email'],
                    'name' => $row['nombre'],
                    'status' => $statuses[$row['estado']],
                    'email_verified_at' => now(),
                ]);
                $user->student->fill([
                    "grade_id" => $grade->id,
                    "dni" => $row['dni'],
                ])->save();
            } else {
                $user = User::create([
                    'email' => $row['email'],
                    'name' => $row['nombre'],
                    'status' => $statuses[$row['estado']],
                    'email_verified_at' => now(),
                    'password' => Hash::make(Str::random(10))
                ]);

                Student::create([
                    'user_id' => $user->id,
                    'grade_id' => $grade->id,
                    'dni' => $row['dni'],
                ]);
            }
        }
    }

    //big files
    public function chunkSize(): int
    {
        return 1000;
    }
}




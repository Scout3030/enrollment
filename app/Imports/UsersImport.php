<?php

namespace App\Imports;

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
            if(!array_key_exists('grade', $row->toArray()) || !array_key_exists('email', $row->toArray())
                || !array_key_exists('name', $row->toArray()) || !array_key_exists('status', $row->toArray())){
                throw ValidationException::withMessages([__('Invalid excel format, please import a valid file.')]);
            }

            $email_verified = $row['email_verified_at'] ? now() : '';

            $grade = Grade::whereName($row['grade'])->first();
            $user = User::whereEmail($row['email'])->first();

            if ($user) {
                $user->update([
                    'email' => $row['email'],
                    'name' => $row['name'],
                    'status' => $row['status'],
                    'email_verified_at' => $email_verified,
                ]);
                $user->student->fill(["grade_id" => $grade->id])->save();
            } else {
                $users = User::create([
                    'email' => $row['email'],
                    'name' => $row['name'],
                    'status' => $row['status'],
                    'email_verified_at' => $email_verified,
                    'password' => Hash::make(Str::random(10))
                ]);
                $users->assignRole('student');

                Student::create([
                    'user_id' => $users->id,
                    'grade_id' => $grade->id,
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




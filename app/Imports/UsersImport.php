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
            if( !array_key_exists('dni', $headers)
                || !array_key_exists('nombre', $headers) || !array_key_exists('usuario', $headers)
                || !array_key_exists('e_mail', $headers )){
                throw ValidationException::withMessages([__('Invalid excel format, please import a valid file.')]);
            }
          
            $user = User::whereEmail($row['usuario'].$row['e_mail'])->first();
            if ($user) {
                $user->update([
                    'email' => $row['usuario'].$row['e_mail'],
                    'name' => $row['nombre'],
                    'email_verified_at' => now(),
                                    
                ]);
                $user->student->fill([
                    'dni' => $row['dni'], 
                ])->save();
            } else {
                $user = User::create([
                    'email' => $row['usuario'].$row['e_mail'],
                    'name' => $row['nombre'], 
                    'password' => Hash::make(Str::random(10)),
                    'email_verified_at' => now(),                  
                ]);

                Student::create([
                    'user_id' => $user->id,
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




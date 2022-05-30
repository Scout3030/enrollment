<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\User;
use App\Models\Grade;
use Carbon\Carbon;
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
            if($row['email_verified_at']){
                $email_verified = now();
            }
            else{
                $email_verified = '';
            }

            $grade = Grade::where('name', $row['grade'])->first();
           $user = User::where('email',  $row['email'])->first();
           if ($user) {
               $user->update([
                'email' =>   $row['email'],
                'name' =>   $row['name'],
                'status' =>   $row['status'],
                'email_verified_at' => $email_verified,
               ]);
               Student::where("user_id", $user->id)->update(["grade_id" =>  $grade->id]);
           } else {
            $users = User::create(
                ['email' =>   $row['email'],
                'name' =>   $row['name'],
                'status' =>   $row['status'],
                'email_verified_at' => $email_verified,
                'password' => Hash::make(Str::random(10))]              
               
            );
            $users->assignRole('student');
               
                 Student::create(
                ['user_id' =>   $users->id,
                'grade_id' => $grade->id,
               ]       
            );
         }

        }                            
    }
    //por si fuesen archivos muy grandes
    public function chunkSize(): int
    {
        return 1000;
    }
}




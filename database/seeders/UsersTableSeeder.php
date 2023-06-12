<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $accounts = [
            [
                'id'             => '1',
                'name'          => 'Admin User',
                'student_no'          => null,
                'email'          => 'admin@admin.com',
                'contact_number'           => null,
                'gender'           => null,
                'course'           => null,
                'year'           => null,
                'section'           => null,
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '2',
                'name'          => 'Sample Student',
                'student_no'          => 'IT001',
                'email'          => 'student@student.com',
                'contact_number'           => '09776669978',
                'gender'           => 'MALE',
                'course'           => 'BSIT',
                'year'            => '4th Year',
                'section'           => 'A',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'id'             => '3',
                'name'          => 'Sample Student1',
                'student_no'          => 'CS001',
                'email'          => 'student1@student1.com',
                'contact_number'           => '09776669978',
                'gender'           => 'MALE',
                'course'           => 'BSCS',
                'year'            => '4th Year',
                'section'           => 'A',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'remember_token' => null,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            
        ];

        
        User::insert($accounts);
      
        
    }
}

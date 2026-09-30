<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@attendance.test'],
            ['name' => 'System Administrator', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        $teacher = User::updateOrCreate(
            ['email' => 'teacher@attendance.test'],
            ['name' => 'Demo Teacher', 'password' => Hash::make('password'), 'role' => 'teacher']
        );

        $mis = Department::updateOrCreate(['code' => 'MIS'], ['name' => 'Management Information Systems', 'description' => 'Information systems and technology program.']);
        $it = Department::updateOrCreate(['code' => 'IT'], ['name' => 'Information Technology', 'description' => 'Information technology program.']);
        $business = Department::updateOrCreate(['code' => 'BUS'], ['name' => 'Business Administration', 'description' => 'Business and management program.']);

        $students = [
            ['student_code' => 'SV001', 'first_name' => 'Dara', 'last_name' => 'Sok', 'gender' => 'Male', 'dob' => '2005-03-12', 'phone' => '012345678', 'department_id' => $mis->id],
            ['student_code' => 'SV002', 'first_name' => 'Sophea', 'last_name' => 'Kim', 'gender' => 'Female', 'dob' => '2005-07-21', 'phone' => '012345679', 'department_id' => $mis->id],
            ['student_code' => 'SV003', 'first_name' => 'Vannak', 'last_name' => 'Chea', 'gender' => 'Male', 'dob' => '2004-11-02', 'phone' => '012345680', 'department_id' => $it->id],
            ['student_code' => 'SV004', 'first_name' => 'Sreyneang', 'last_name' => 'Lim', 'gender' => 'Female', 'dob' => '2005-01-19', 'phone' => '012345681', 'department_id' => $business->id],
            ['student_code' => 'SV005', 'first_name' => 'Borey', 'last_name' => 'Heng', 'gender' => 'Male', 'dob' => '2004-09-28', 'phone' => '012345682', 'department_id' => $mis->id],
        ];

        foreach ($students as $data) {
            $student = Student::updateOrCreate(['student_code' => $data['student_code']], $data);
            Attendance::updateOrCreate(
                ['student_id' => $student->id, 'attendance_date' => now()->toDateString()],
                ['status' => $student->student_code === 'SV003' ? 'Late' : ($student->student_code === 'SV004' ? 'Absent' : 'Present'), 'check_in' => $student->student_code === 'SV003' ? '08:18' : ($student->student_code === 'SV004' ? null : '08:00')]
            );
        }
    }
}

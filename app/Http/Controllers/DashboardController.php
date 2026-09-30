<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $totalStudents = Student::count();
        $totalDepartments = Department::count();
        $todayRecords = Attendance::whereDate('attendance_date', $today)->get();

        return view('dashboard', [
            'totalStudents' => $totalStudents,
            'totalDepartments' => $totalDepartments,
            'presentToday' => $todayRecords->where('status', 'Present')->count(),
            'absentToday' => $todayRecords->where('status', 'Absent')->count(),
            'lateToday' => $todayRecords->where('status', 'Late')->count(),
            'recentAttendance' => Attendance::with('student')->latest('attendance_date')->latest('id')->take(8)->get(),
        ]);
    }
}

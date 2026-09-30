<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', now()->toDateString());
        $status = $request->input('status');
        $search = trim($request->input('search', ''));

        $attendances = Attendance::with(['student.department'])
            ->whereDate('attendance_date', $date)
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($search, fn($q) => $q->whereHas('student', function ($query) use ($search) {
                $query->where('student_code', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            }))
            ->latest('id')->paginate(12)->withQueryString();

        return view('attendance.index', compact('attendances', 'date', 'status', 'search'));
    }

    public function create()
    {
        return view('attendance.create', ['students' => Student::orderBy('last_name')->orderBy('first_name')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'attendance_date' => ['required', 'date'],
            'status' => ['required', 'in:Present,Absent,Late,Excused'],
            'check_in' => ['nullable', 'date_format:H:i'],
            'note' => ['nullable', 'string', 'max:500'],
        ]);

        $existing = Attendance::where('student_id', $data['student_id'])
            ->whereDate('attendance_date', $data['attendance_date'])->first();
        if ($existing) {
            return back()->withInput()->with('error', 'Attendance for this student and date already exists.');
        }

        Attendance::create($data);
        return redirect()->route('attendance.index', ['date' => $data['attendance_date']])->with('success', 'Attendance recorded successfully.');
    }

    public function edit(Attendance $attendance)
    {
        return view('attendance.edit', [
            'attendance' => $attendance,
            'students' => Student::orderBy('last_name')->orderBy('first_name')->get(),
        ]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'attendance_date' => ['required', 'date'],
            'status' => ['required', 'in:Present,Absent,Late,Excused'],
            'check_in' => ['nullable', 'date_format:H:i'],
            'note' => ['nullable', 'string', 'max:500'],
        ]);

        $duplicate = Attendance::where('student_id', $data['student_id'])
            ->whereDate('attendance_date', $data['attendance_date'])
            ->where('id', '!=', $attendance->id)->exists();
        if ($duplicate) {
            return back()->withInput()->with('error', 'Another attendance record already exists for this student and date.');
        }

        $attendance->update($data);
        return redirect()->route('attendance.index', ['date' => $data['attendance_date']])->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $date = $attendance->attendance_date->format('Y-m-d');
        $attendance->delete();
        return redirect()->route('attendance.index', ['date' => $date])->with('success', 'Attendance deleted successfully.');
    }
}

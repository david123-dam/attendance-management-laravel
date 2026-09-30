<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $department = $request->input('department');

        $students = Student::with('department')
            ->when($search, fn($q) => $q->where(function ($query) use ($search) {
                $query->where('student_code', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            }))
            ->when($department, fn($q) => $q->where('department_id', $department))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('students.index', [
            'students' => $students,
            'departments' => Department::orderBy('name')->get(),
            'search' => $search,
            'department' => $department,
        ]);
    }

    public function create()
    {
        return view('students.create', ['departments' => Department::orderBy('name')->get()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_code' => ['required', 'string', 'max:30', 'unique:students,student_code'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'dob' => ['nullable', 'date'],
            'phone' => ['nullable', 'string', 'max:30'],
            'department_id' => ['required', 'exists:departments,id'],
        ]);

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        $student->load('department', 'attendances');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
            'departments' => Department::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'student_code' => ['required', 'string', 'max:30', 'unique:students,student_code,' . $student->id],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'dob' => ['nullable', 'date'],
            'phone' => ['nullable', 'string', 'max:30'],
            'department_id' => ['required', 'exists:departments,id'],
        ]);

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}

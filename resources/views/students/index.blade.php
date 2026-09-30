@extends('layouts.app') @section('title','Students') @section('page_title','Students') @section('content')<div class="page-head">
    <div>
        <h1>Students</h1>
        <p>Search and manage students linked to departments.</p>
    </div><a class="btn btn-primary" href="{{ route('students.create') }}"><i class="fa-solid fa-plus"></i> Add Student</a>
</div>
<div class="card panel">
    <form class="toolbar" method="GET"><input class="input" name="search" value="{{ $search }}" placeholder="Search name or student code..."><select class="select" name="department">
            <option value="">All departments</option>@foreach($departments as $dept)<option value="{{ $dept->id }}" @selected($department==$dept->id)>{{ $dept->name }}</option>@endforeach
        </select><button class="btn btn-primary">Search</button><a class="btn btn-light" href="{{ route('students.index') }}">Reset</a></form>
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Student</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>@forelse($students as $student)<tr>
                    <td><strong>{{ $student->student_code }}</strong></td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->department->name }}</td>
                    <td>{{ $student->phone ?: '—' }}</td>
                    <td>
                        <div class="actions"><a class="btn btn-light" href="{{ route('students.show',$student) }}">View</a><a class="btn btn-light" href="{{ route('students.edit',$student) }}">Edit</a>
                            <form method="POST" action="{{ route('students.destroy',$student) }}" onsubmit="return confirm('Delete this student and their attendance records?')">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form>
                        </div>
                    </td>
                </tr>@empty<tr>
                    <td colspan="6" class="empty">No students found.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>{{ $students->links() }}
</div>@endsection
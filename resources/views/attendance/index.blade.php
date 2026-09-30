@extends('layouts.app') @section('title','Attendance') @section('page_title','Attendance') @section('content')<div class="page-head">
    <div>
        <h1>Attendance Records</h1>
        <p>Filter attendance by date, status, or student name.</p>
    </div><a class="btn btn-primary" href="{{ route('attendance.create') }}"><i class="fa-solid fa-plus"></i> Record Attendance</a>
</div>
<div class="card panel">
    <form class="toolbar" method="GET"><input class="input" type="date" name="date" value="{{ $date }}"><input class="input" name="search" value="{{ $search }}" placeholder="Search student..."><select class="select" name="status">
            <option value="">All statuses</option>@foreach(['Present','Absent','Late','Excused'] as $item)<option value="{{ $item }}" @selected($status===$item)>{{ $item }}</option>@endforeach
        </select><button class="btn btn-primary">Filter</button><a class="btn btn-light" href="{{ route('attendance.index') }}">Today</a></form>
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Department</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Check-in</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>@forelse($attendances as $row)<tr>
                    <td><strong>{{ $row->student->first_name }} {{ $row->student->last_name }}</strong><br><span style="color:#6b7280">{{ $row->student->student_code }}</span></td>
                    <td>{{ $row->student->department->code }}</td>
                    <td>{{ $row->attendance_date->format('M d, Y') }}</td>
                    <td><span class="badge badge-{{ strtolower($row->status) }}">{{ $row->status }}</span></td>
                    <td>{{ $row->check_in ?: '—' }}</td>
                    <td>{{ $row->note ?: '—' }}</td>
                    <td>
                        <div class="actions"><a class="btn btn-light" href="{{ route('attendance.edit',$row) }}">Edit</a>
                            <form method="POST" action="{{ route('attendance.destroy',$row) }}" onsubmit="return confirm('Delete this attendance record?')">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form>
                        </div>
                    </td>
                </tr>@empty<tr>
                    <td colspan="7" class="empty">No attendance records match your filters.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>{{ $attendances->links() }}
</div>@endsection
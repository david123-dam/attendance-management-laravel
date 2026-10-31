@extends('layouts.app') @section('title','Dashboard') @section('page_title','Dashboard') @section('content')
<div class="page-head">
    <div>
        <h1>Attendance Dashboard</h1>
        <p>Monitor students and today's attendance at a glance.</p>
    </div><a class="btn btn-primary" href="{{ route('attendance.create') }}"><i class="fa-solid fa-plus"></i> Record Attendance</a>
</div>
<div class="grid stats">
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-user-graduate"></i></span></div>
        <h3>{{ $totalStudents }}</h3>
        <p>Total Students</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-building-columns"></i></span></div>
        <h3>{{ $totalDepartments }}</h3>
        <p>Departments</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-circle-check"></i></span></div>
        <h3>{{ $presentToday }}</h3>
        <p>Present Today</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-clock"></i></span></div>
        <h3>{{ $lateToday }}</h3>
        <p>Late Today</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></span></div>
        <h3>{{ $absentToday }}</h3>
        <p>Absent Today</p>
    </div>
</div>
<div class="two-col" style="margin-top:18px">
    <div class="card panel">
        <div class="page-head" style="margin-bottom:10px">
            <div>
                <h1 style="font-size:18px">Recent Attendance</h1>
                <p>Latest attendance records.</p>
            </div><a class="btn btn-light" href="{{ route('attendance.index') }}">View all</a>
        </div>
        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Check in</th>
                    </tr>
                </thead>
                <tbody>@forelse($recentAttendance as $row)<tr>
                        <td><strong>{{ $row->student->first_name }} {{ $row->student->last_name }}</strong><br><span style="color:#6b7280">{{ $row->student->student_code }}</span></td>
                        <td>{{ $row->attendance_date->format('M d, Y') }}</td>
                        <td><span class="badge badge-{{ strtolower($row->status) }}">{{ $row->status }}</span></td>
                        <td>{{ $row->check_in ? \Illuminate\Support\Carbon::parse($row->check_in)->format('h:i A') : '—' }}</td>
                    </tr>@empty<tr>
                        <td colspan="4" class="empty">No attendance records yet.</td>
                    </tr>@endforelse</tbody>
            </table>
        </div>
    </div>
    <div class="card panel">
        <h2 style="font-size:18px;margin:0 0 8px">Quick actions</h2>
        <p style="color:#6b7280;font-size:13px">Common tasks for teachers and administrators.</p>
        <div style="display:grid;gap:10px;margin-top:18px"><a class="btn btn-primary" href="{{ route('students.create') }}"><i class="fa-solid fa-user-plus"></i> Add Student</a><a class="btn btn-light" href="{{ route('students.index') }}"><i class="fa-solid fa-users"></i> Manage Students</a><a class="btn btn-light" href="{{ route('departments.index') }}"><i class="fa-solid fa-building"></i> Manage Departments</a></div>
    </div>
</div>
@endsection
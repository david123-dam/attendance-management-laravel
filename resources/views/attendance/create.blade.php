@extends('layouts.app') @section('title','Record Attendance') @section('page_title','Record Attendance') @section('content')<div class="page-head">
    <div>
        <h1>Record Attendance</h1>
        <p>Add a daily attendance record for a student.</p>
    </div>
</div>
<div class="card panel">
    <form method="POST" action="{{ route('attendance.store') }}">@csrf @include('attendance._form',['buttonText'=>'Save Attendance'])</form>
</div>@endsection
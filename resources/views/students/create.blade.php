@extends('layouts.app') @section('title','Add Student') @section('page_title','Add Student') @section('content')<div class="page-head">
    <div>
        <h1>Add Student</h1>
        <p>Create a student profile for attendance tracking.</p>
    </div>
</div>
<div class="card panel">
    <form method="POST" action="{{ route('students.store') }}">@csrf @include('students._form',['buttonText'=>'Create Student'])</form>
</div>@endsection
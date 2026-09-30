@extends('layouts.app') @section('title','Departments') @section('page_title','Departments') @section('content')<div class="page-head">
    <div>
        <h1>Departments</h1>
        <p>Manage departments used to organize students.</p>
    </div><a class="btn btn-primary" href="{{ route('departments.create') }}"><i class="fa-solid fa-plus"></i> Add Department</a>
</div>
<div class="card panel">
    <form class="toolbar" method="GET"><input class="input" name="search" value="{{ $search }}" placeholder="Search department..."><button class="btn btn-primary">Search</button><a class="btn btn-light" href="{{ route('departments.index') }}">Reset</a></form>
    <div class="table-wrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Students</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>@forelse($departments as $department)<tr>
                    <td><strong>{{ $department->code }}</strong></td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->students_count }}</td>
                    <td>{{ $department->description ?: '—' }}</td>
                    <td>
                        <div class="actions"><a class="btn btn-light" href="{{ route('departments.edit',$department) }}">Edit</a>
                            <form method="POST" action="{{ route('departments.destroy',$department) }}" onsubmit="return confirm('Delete this department?')">@csrf @method('DELETE')<button class="btn btn-danger">Delete</button></form>
                        </div>
                    </td>
                </tr>@empty<tr>
                    <td colspan="5" class="empty">No departments found.</td>
                </tr>@endforelse</tbody>
        </table>
    </div>{{ $departments->links() }}
</div>@endsection
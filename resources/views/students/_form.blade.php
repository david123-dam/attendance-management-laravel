<div class="form-grid">
    <div class="field"><label>Student Code</label><input class="input" name="student_code" value="{{ old('student_code', $student->student_code ?? '') }}" required></div>
    <div class="field"><label>Department</label><select class="select" name="department_id" required>
            <option value="">Select department</option>@foreach($departments as $dept)<option value="{{ $dept->id }}" @selected(old('department_id', $student->department_id ?? '') == $dept->id)>{{ $dept->name }} ({{ $dept->code }})</option>@endforeach
        </select></div>
    <div class="field"><label>First Name</label><input class="input" name="first_name" value="{{ old('first_name', $student->first_name ?? '') }}" required></div>
    <div class="field"><label>Last Name</label><input class="input" name="last_name" value="{{ old('last_name', $student->last_name ?? '') }}" required></div>
    <div class="field"><label>Gender</label><select class="select" name="gender" required>
            <option value="">Select gender</option>@foreach(['Male','Female','Other'] as $gender)<option value="{{ $gender }}" @selected(old('gender', $student->gender ?? '') === $gender)>{{ $gender }}</option>@endforeach
        </select></div>
    <div class="field"><label>Date of Birth</label><input class="input" type="date" name="dob" value="{{ old('dob', isset($student) && $student->dob ? $student->dob->format('Y-m-d') : '') }}"></div>
    <div class="field"><label>Phone</label><input class="input" name="phone" value="{{ old('phone', $student->phone ?? '') }}"></div>
</div>
<div class="form-actions"><a class="btn btn-light" href="{{ route('students.index') }}">Cancel</a><button class="btn btn-primary" type="submit">{{ $buttonText }}</button></div>
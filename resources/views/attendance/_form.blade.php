<div class="form-grid">
    <div class="field"><label>Student</label><select class="select" name="student_id" required>
            <option value="">Select student</option>@foreach($students as $student)<option value="{{ $student->id }}" @selected(old('student_id',$attendance->student_id ?? '') == $student->id)>{{ $student->student_code }} — {{ $student->first_name }} {{ $student->last_name }}</option>@endforeach
        </select></div>
    <div class="field"><label>Date</label><input class="input" type="date" placeholder="Enter " name="attendance_date" value="{{ old('attendance_date',isset($attendance) ? $attendance->attendance_date->format('Y-m-d') : now()->toDateString()) }}" required></div>
    <div class="field"><label>Status</label><select class="select" name="status" required>@foreach(['Present','Absent','Late','Excused'] as $status)<option value="{{ $status }}" @selected(old('status',$attendance->status ?? '') === $status)>{{ $status }}</option>@endforeach</select></div>
    <div class="field"><label>Check-in Time</label><input class="input" type="time" name="check_in" value="{{ old('check_in',$attendance->check_in ?? '') }}"></div>
    <div class="field full"><label>Note</label><input class="input" name="note" value="{{ old('note',$attendance->note ?? '') }}" placeholder="Optional note"></div>
</div>
<div class="form-actions"><a class="btn btn-light" href="{{ route('attendance.index') }}">Cancel</a><button class="btn btn-primary">{{ $buttonText }}</button></div>
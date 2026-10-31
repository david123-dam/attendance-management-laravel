 <?php $__env->startSection('title','Dashboard'); ?> <?php $__env->startSection('page_title','Dashboard'); ?> <?php $__env->startSection('content'); ?>
<div class="page-head">
    <div>
        <h1>Attendance Dashboard</h1>
        <p>Monitor students and today's attendance at a glance.</p>
    </div><a class="btn btn-primary" href="<?php echo e(route('attendance.create')); ?>"><i class="fa-solid fa-plus"></i> Record Attendance</a>
</div>
<div class="grid stats">
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-user-graduate"></i></span></div>
        <h3><?php echo e($totalStudents); ?></h3>
        <p>Total Students</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-building-columns"></i></span></div>
        <h3><?php echo e($totalDepartments); ?></h3>
        <p>Departments</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-circle-check"></i></span></div>
        <h3><?php echo e($presentToday); ?></h3>
        <p>Present Today</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-clock"></i></span></div>
        <h3><?php echo e($lateToday); ?></h3>
        <p>Late Today</p>
    </div>
    <div class="card stat">
        <div class="stat-top"><span class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></span></div>
        <h3><?php echo e($absentToday); ?></h3>
        <p>Absent Today</p>
    </div>
</div>
<div class="two-col" style="margin-top:18px">
    <div class="card panel">
        <div class="page-head" style="margin-bottom:10px">
            <div>
                <h1 style="font-size:18px">Recent Attendance</h1>
                <p>Latest attendance records.</p>
            </div><a class="btn btn-light" href="<?php echo e(route('attendance.index')); ?>">View all</a>
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
                <tbody><?php $__empty_1 = true; $__currentLoopData = $recentAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr>
                        <td><strong><?php echo e($row->student->first_name); ?> <?php echo e($row->student->last_name); ?></strong><br><span style="color:#6b7280"><?php echo e($row->student->student_code); ?></span></td>
                        <td><?php echo e($row->attendance_date->format('M d, Y')); ?></td>
                        <td><span class="badge badge-<?php echo e(strtolower($row->status)); ?>"><?php echo e($row->status); ?></span></td>
                        <td><?php echo e($row->check_in ? \Illuminate\Support\Carbon::parse($row->check_in)->format('h:i A') : '—'); ?></td>
                    </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr>
                        <td colspan="4" class="empty">No attendance records yet.</td>
                    </tr><?php endif; ?></tbody>
            </table>
        </div>
    </div>
    <div class="card panel">
        <h2 style="font-size:18px;margin:0 0 8px">Quick actions</h2>
        <p style="color:#6b7280;font-size:13px">Common tasks for teachers and administrators.</p>
        <div style="display:grid;gap:10px;margin-top:18px"><a class="btn btn-primary" href="<?php echo e(route('students.create')); ?>"><i class="fa-solid fa-user-plus"></i> Add Student</a><a class="btn btn-light" href="<?php echo e(route('students.index')); ?>"><i class="fa-solid fa-users"></i> Manage Students</a><a class="btn btn-light" href="<?php echo e(route('departments.index')); ?>"><i class="fa-solid fa-building"></i> Manage Departments</a></div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\attendance_management_laravel13\resources\views/dashboard.blade.php ENDPATH**/ ?>
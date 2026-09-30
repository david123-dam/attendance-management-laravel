 <?php $__env->startSection('title','Attendance'); ?> <?php $__env->startSection('page_title','Attendance'); ?> <?php $__env->startSection('content'); ?><div class="page-head">
    <div>
        <h1>Attendance Records</h1>
        <p>Filter attendance by date, status, or student name.</p>
    </div><a class="btn btn-primary" href="<?php echo e(route('attendance.create')); ?>"><i class="fa-solid fa-plus"></i> Record Attendance</a>
</div>
<div class="card panel">
    <form class="toolbar" method="GET"><input class="input" type="date" name="date" value="<?php echo e($date); ?>"><input class="input" name="search" value="<?php echo e($search); ?>" placeholder="Search student..."><select class="select" name="status">
            <option value="">All statuses</option><?php $__currentLoopData = ['Present','Absent','Late','Excused']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($item); ?>" <?php if($status===$item): echo 'selected'; endif; ?>><?php echo e($item); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><button class="btn btn-primary">Filter</button><a class="btn btn-light" href="<?php echo e(route('attendance.index')); ?>">Today</a></form>
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
            <tbody><?php $__empty_1 = true; $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr>
                    <td><strong><?php echo e($row->student->first_name); ?> <?php echo e($row->student->last_name); ?></strong><br><span style="color:#6b7280"><?php echo e($row->student->student_code); ?></span></td>
                    <td><?php echo e($row->student->department->code); ?></td>
                    <td><?php echo e($row->attendance_date->format('M d, Y')); ?></td>
                    <td><span class="badge badge-<?php echo e(strtolower($row->status)); ?>"><?php echo e($row->status); ?></span></td>
                    <td><?php echo e($row->check_in ?: '—'); ?></td>
                    <td><?php echo e($row->note ?: '—'); ?></td>
                    <td>
                        <div class="actions"><a class="btn btn-light" href="<?php echo e(route('attendance.edit',$row)); ?>">Edit</a>
                            <form method="POST" action="<?php echo e(route('attendance.destroy',$row)); ?>" onsubmit="return confirm('Delete this attendance record?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-danger">Delete</button></form>
                        </div>
                    </td>
                </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr>
                    <td colspan="7" class="empty">No attendance records match your filters.</td>
                </tr><?php endif; ?></tbody>
        </table>
    </div><?php echo e($attendances->links()); ?>

</div><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\attendance_management_laravel13\resources\views/attendance/index.blade.php ENDPATH**/ ?>
 <?php $__env->startSection('title','Students'); ?> <?php $__env->startSection('page_title','Students'); ?> <?php $__env->startSection('content'); ?><div class="page-head">
    <div>
        <h1>Students</h1>
        <p>Search and manage students linked to departments.</p>
    </div><a class="btn btn-primary" href="<?php echo e(route('students.create')); ?>"><i class="fa-solid fa-plus"></i> Add Student</a>
</div>
<div class="card panel">
    <form class="toolbar" method="GET"><input class="input" name="search" value="<?php echo e($search); ?>" placeholder="Search name or student code..."><select class="select" name="department">
            <option value="">All departments</option><?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($dept->id); ?>" <?php if($department==$dept->id): echo 'selected'; endif; ?>><?php echo e($dept->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><button class="btn btn-primary">Search</button><a class="btn btn-light" href="<?php echo e(route('students.index')); ?>">Reset</a></form>
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
            <tbody><?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr>
                    <td><strong><?php echo e($student->student_code); ?></strong></td>
                    <td><?php echo e($student->first_name); ?> <?php echo e($student->last_name); ?></td>
                    <td><?php echo e($student->gender); ?></td>
                    <td><?php echo e($student->department->name); ?></td>
                    <td><?php echo e($student->phone ?: '—'); ?></td>
                    <td>
                        <div class="actions"><a class="btn btn-light" href="<?php echo e(route('students.show',$student)); ?>">View</a><a class="btn btn-light" href="<?php echo e(route('students.edit',$student)); ?>">Edit</a>
                            <form method="POST" action="<?php echo e(route('students.destroy',$student)); ?>" onsubmit="return confirm('Delete this student and their attendance records?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-danger">Delete</button></form>
                        </div>
                    </td>
                </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr>
                    <td colspan="6" class="empty">No students found.</td>
                </tr><?php endif; ?></tbody>
        </table>
    </div><?php echo e($students->links()); ?>

</div><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\attendance_management_laravel13\resources\views/students/index.blade.php ENDPATH**/ ?>
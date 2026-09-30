 <?php $__env->startSection('title','Departments'); ?> <?php $__env->startSection('page_title','Departments'); ?> <?php $__env->startSection('content'); ?><div class="page-head">
    <div>
        <h1>Departments</h1>
        <p>Manage departments used to organize students.</p>
    </div><a class="btn btn-primary" href="<?php echo e(route('departments.create')); ?>"><i class="fa-solid fa-plus"></i> Add Department</a>
</div>
<div class="card panel">
    <form class="toolbar" method="GET"><input class="input" name="search" value="<?php echo e($search); ?>" placeholder="Search department..."><button class="btn btn-primary">Search</button><a class="btn btn-light" href="<?php echo e(route('departments.index')); ?>">Reset</a></form>
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
            <tbody><?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr>
                    <td><strong><?php echo e($department->code); ?></strong></td>
                    <td><?php echo e($department->name); ?></td>
                    <td><?php echo e($department->students_count); ?></td>
                    <td><?php echo e($department->description ?: '—'); ?></td>
                    <td>
                        <div class="actions"><a class="btn btn-light" href="<?php echo e(route('departments.edit',$department)); ?>">Edit</a>
                            <form method="POST" action="<?php echo e(route('departments.destroy',$department)); ?>" onsubmit="return confirm('Delete this department?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-danger">Delete</button></form>
                        </div>
                    </td>
                </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr>
                    <td colspan="5" class="empty">No departments found.</td>
                </tr><?php endif; ?></tbody>
        </table>
    </div><?php echo e($departments->links()); ?>

</div><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\attendance_management_laravel13\resources\views/departments/index.blade.php ENDPATH**/ ?>
 <?php $__env->startSection('title','Add Student'); ?> <?php $__env->startSection('page_title','Add Student'); ?> <?php $__env->startSection('content'); ?><div class="page-head">
    <div>
        <h1>Add Student</h1>
        <p>Create a student profile for attendance tracking.</p>
    </div>
</div>
<div class="card panel">
    <form method="POST" action="<?php echo e(route('students.store')); ?>"><?php echo csrf_field(); ?> <?php echo $__env->make('students._form',['buttonText'=>'Create Student'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></form>
</div><?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\attendance_management_laravel13\resources\views/students/create.blade.php ENDPATH**/ ?>
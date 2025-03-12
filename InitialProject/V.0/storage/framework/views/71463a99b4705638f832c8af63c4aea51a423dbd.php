<!-- <?php
   if(Auth::user()->hasRole('admin')) {
      $layoutDirectory = 'dashboards.admins.layouts.admin-dash-layout';
   } else {
      $layoutDirectory = 'dashboards.users.layouts.user-dash-layout';
   }
?> -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Create department
                <span class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('departments.index')); ?>">departments</a>
                </span>
            </div>
            <div class="card-body">
                <?php echo Form::open(array('route' => 'departments.store', 'method'=>'department')); ?>

                    <div class="form-group">
                        <strong>department_name_TH	:</strong>
                        <?php echo Form::text('department_name_th', null, array('placeholder' => 'Department Name TH','class' => 'form-control')); ?>

                    </div>
                    <div class="form-group">
                        <strong>department_name_EN	:</strong>
                        <?php echo Form::text('department_name_en', null, array('placeholder' => 'Department Name EN','class' => 'form-control')); ?>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/departments/create.blade.php ENDPATH**/ ?>
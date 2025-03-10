
<?php $__env->startSection('title', __('message.dashboard')); ?>

<?php $__env->startSection('content'); ?>
<h3 style="padding-top: 10px;"><?php echo e(__('message.WelcomeDashboardUser')); ?></h3>
<br>
<h4><?php echo e(__('message.Hello')); ?> 
    <?php if(App::getLocale() == 'th'): ?> 
        <?php echo e(Auth::user()->position_th); ?> <?php echo e(Auth::user()->fname_th); ?> <?php echo e(Auth::user()->lname_th); ?>

    <?php else: ?>
        <?php echo e(Auth::user()->position_en); ?> <?php echo e(Auth::user()->fname_en); ?> <?php echo e(Auth::user()->lname_en); ?>

    <?php endif; ?>
</h4>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/dashboards/users/index.blade.php ENDPATH**/ ?>
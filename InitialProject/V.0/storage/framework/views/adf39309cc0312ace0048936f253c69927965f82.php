

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo app('translator')->get('message.fund_detail'); ?></h4>
            <p class="card-description"><?php echo app('translator')->get('message.fund_description'); ?></p>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.fund_name'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.fund_year'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_year); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.fund_details'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_details); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.fund_type'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_type); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.fund_level'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_level); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.fund_agency'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->fund_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo app('translator')->get('message.added_by'); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($fund->user->fname_th); ?> <?php echo e($fund->user->lname_th); ?></p>
            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('funds.index')); ?>"> <?php echo app('translator')->get('message.back'); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/funds/show.blade.php ENDPATH**/ ?>
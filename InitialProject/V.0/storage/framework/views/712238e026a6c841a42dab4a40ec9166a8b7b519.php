
<?php $__env->startSection('content'); ?>
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('message.whoops')); ?></strong> <?php echo e(__('message.errors_occurred')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('message.edit_fund')); ?></h4>
                <p class="card-description"><?php echo e(__('message.fill_fund_edit_details')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('funds.update',$fund->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <p class="col-sm-3 "><b><?php echo e(__('message.fund_type')); ?></b></p>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="ทุนภายใน" <?php echo e($fund->fund_type == 'ทุนภายใน' ? 'selected' : ''); ?>><?php echo e(__('message.internal_fund')); ?></option>
                                <option value="ทุนภายนอก" <?php echo e($fund->fund_type == 'ทุนภายนอก' ? 'selected' : ''); ?>><?php echo e(__('message.external_fund')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <p class="col-sm-3"><b><?php echo e(__('message.fund_level')); ?></b></p>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                    <option value=""<?php echo e($fund->fund_level == '' ? 'selected' : ''); ?>><?php echo e(__('message.not_specified')); ?></option>
                                    <option value="สูง" <?php echo e($fund->fund_level == 'สูง' ? 'selected' : ''); ?>><?php echo e(__('message.high')); ?></option>
                                    <option value="กลาง" <?php echo e($fund->fund_level == 'กลาง' ? 'selected' : ''); ?>><?php echo e(__('message.medium')); ?></option>
                                    <option value="ล่าง" <?php echo e($fund->fund_level == 'ล่าง' ? 'selected' : ''); ?>><?php echo e(__('message.low')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 "><b><?php echo e(__('message.fund_name')); ?></b></p>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" value="<?php echo e($fund->fund_name); ?>" class="form-control" placeholder="<?php echo e(__('message.fund_name')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 "><b><?php echo e(__('message.support_resource')); ?></b></p>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" value="<?php echo e($fund->support_resource); ?>" class="form-control" placeholder="<?php echo e(__('message.support_resource_placeholder')); ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('message.submit')); ?></button>
                    <a class="btn btn-light mt-5" href="<?php echo e(route('funds.index')); ?>"><?php echo e(__('message.cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const ac = document.getElementById("fund_code");
    const ab = document.getElementById("fund_type").value;
    
    if (ab === "ทุนภายนอก") {
        ac.style.display = "none";
    }

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "ทุนภายใน" ? "block" : "none";
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/funds/edit.blade.php ENDPATH**/ ?>
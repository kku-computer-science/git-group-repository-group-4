
<!-- <link  rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
<?php $__env->startSection('content'); ?>

<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(trans('message.whoops')); ?></strong><?php echo e(trans('message.input_problems')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.add_research_project')); ?></h4>
                <p class="card-description"><?php echo e(trans('message.fill_in_details')); ?></p>
                <form action="<?php echo e(route('researchProjects.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row mt-5">
                        <label for="exampleInputfund_name" class="col-sm-2 "><?php echo e(trans('message.project_name')); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="project_name" class="form-control" placeholder="<?php echo e(trans('message.project_name')); ?>" value="<?php echo e(old('project_name')); ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 "><?php echo e(trans('message.start_date')); ?></label>
                        <div class="col-sm-4">
                            <input type="date" name="project_start" id="Project_start" class="form-control" value="<?php echo e(old('project_start')); ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 "><?php echo e(trans('message.end_date')); ?></label>
                        <div class="col-sm-4">
                            <input type="date" name="project_end" id="Project_end" class="form-control" value="<?php echo e(old('project_end')); ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 "><?php echo e(trans('message.select_fund')); ?></label>
                        <div class="col-sm-4">
                            <select id='fund' style='width: 200px;' class="custom-select my-select" name="fund">
                                <option value='' disabled selected><?php echo e(trans('message.select_fund_type')); ?></option><?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($fund->id); ?>"><?php echo e($fund->fund_name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputproject_year" class="col-sm-2 "><?php echo e(trans('message.submission_year')); ?></label>
                        <div class="col-sm-4">
                            <input type="year" name="project_year" class="form-control" placeholder="<?php echo e(trans('message.year')); ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_name" class="col-sm-2 "><?php echo e(trans('message.budget')); ?></label>
                        <div class="col-sm-4">
                            <input type="int" name="budget" class="form-control" placeholder="<?php echo e(trans('message.Amount_in_Baht')); ?>" value="<?php echo e(old('budget')); ?>">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputresponsible_department" class="col-sm-2 "><?php echo e(trans('message.responsible_department')); ?></label>
                        <div class="col-sm-9">
                            <select id='dep' style='width: 200px;' class="custom-select my-select" name="responsible_department">
                                <option value='' disabled selected><?php echo e(trans('message.select_department')); ?></option><?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($dep->department_name_th); ?>"><?php echo e($dep->department_name_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 "><?php echo e(trans('message.project_details')); ?></label>
                        <div class="col-sm-9">
                            <textarea type="text" name="note" class="form-control form-control-lg" style="height:150px" placeholder="<?php echo e(trans('message.note')); ?>" value="<?php echo e(old('note')); ?>"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputstatus" class="col-sm-2 "><?php echo e(trans('message.status')); ?></label>
                        <div class="col-sm-3">
                            <select id='status' class="custom-select my-select" name="status">
                                <option value="" disabled selected><?php echo e(trans('message.status')); ?></option>
                                <option value="1"><?php echo e(trans('message.submitted')); ?></option>
                                <option value="2"><?php echo e(trans('message.in_progress')); ?></option>
                                <option value="3"><?php echo e(trans('message.completed')); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 "><?php echo e(trans('message.project_manager')); ?></label>
                        <div class="col-sm-9">
                            <select id='head0' style='width: 200px;' name="head">
                                <option value=''><?php echo e(trans('message.select_user')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputfund_details" class="col-sm-2 "><?php echo e(trans('message.internal_co_manager')); ?></label>
                        <div class="col-sm-9">
                            <table class="table" id="dynamicAddRemove">
                                <tr>
                                    <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                                </tr>
                                <tr>
                                    <td><select id='selUser0' style='width: 200px;' name="moreFields[0][userid]">
                                            <option value=''><?php echo e(trans('message.select_user')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="exampleInputpaper_doi" class="col-sm-2 "><?php echo e(__('message.external_co_manager')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th><?php echo e(trans('message.title')); ?></th>
                                        <th><?php echo e(trans('message.first_name')); ?></th>
                                        <th><?php echo e(trans('message.last_name')); ?></th>
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore2" title="Add More Person"><i class="mdi mdi-plus"></i></span></a></th>
                                    <tr>
                                        <td><input type="text" name="title_name[]" class="form-control" placeholder="<?php echo e(__('message.title')); ?>"></td>
                                        <td><input type="text" name="fname[]" class="form-control" placeholder="<?php echo e(__('message.first_name')); ?>"></td>
                                        <td><input type="text" name="lname[]" class="form-control" placeholder="<?php echo e(__('message.last_name')); ?>"></td>
                                        <td><a href='javascript:void(0);' class='remove'><span><i class="mdi mdi-minus"></span></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-2"><?php echo e(trans('message.submit')); ?></button>
                        <a class="btn btn-light" href="<?php echo e(route('researchProjects.index')); ?>"><?php echo e(trans('message.cancel')); ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/research_projects/create.blade.php ENDPATH**/ ?>
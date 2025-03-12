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
        <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(\Session::get('success')); ?></p>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header"><?php echo e(__('departments.title')); ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-create')): ?>
                <a class="btn btn-primary" href="<?php echo e(route('departments.create')); ?>"><?php echo e(__('departments.new')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('departments.name')); ?></th>
                            <th width="280px"><?php echo e(__('departments.action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($department->id); ?></td>
                            <td>
    <?php
        $locale = App::getLocale() === 'zh' ? 'cn' : App::getLocale();
        $nameField = 'department_name_' . $locale;
        $departmentName = $department->$nameField ?? $department->department_name_en ?? $department->department_name_th;
    ?>
    <?php echo e($departmentName); ?>

</td>
                            <td>
                                <form action="<?php echo e(route('departments.destroy',$department->id)); ?>" method="POST">
                                    
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('departments.view')); ?>" href="<?php echo e(route('departments.show',$department->id)); ?>"><i class="mdi mdi-eye"></i></a>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-edit')): ?>
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('departments.edit')); ?>" href="<?php echo e(route('departments.edit',$department->id)); ?>"><i class="mdi mdi-pencil"></i></a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('departments-delete')): ?>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <li class="list-inline-item">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('departments.delete')); ?>"><i class="mdi mdi-delete"></i></button>
                                    </li>

                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($data->appends($_GET)->links()); ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `<?php echo e(__('departments.confirm_title')); ?>`,
                text: "<?php echo e(__('departments.confirm_text')); ?>",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("<?php echo e(__('departments.deleted')); ?>", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/departments/index.blade.php ENDPATH**/ ?>
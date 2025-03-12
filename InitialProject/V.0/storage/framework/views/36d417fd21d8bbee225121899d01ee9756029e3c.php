

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">

<?php $__env->startSection('content'); ?>

<div class="container">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
<<<<<<< HEAD
<<<<<<< HEAD
            <h4 class="card-title"><?php echo e(trans('message.Funds')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('funds.create')); ?>"><i class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(trans('message.add')); ?></a>
=======
            <h4 class="card-title"><?php echo e(__('message.fund_research')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('funds.create')); ?>"><i class="mdi mdi-plus btn-icon-prepend"></i> </i> <?php echo e(__('message.add')); ?></a>
            </a>
>>>>>>> 456c3e131f3ead0fef22146c146e83bdfd44b7bc
=======
            <h4 class="card-title"><?php echo e(__('message.fund_research')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('funds.create')); ?>"><i class="mdi mdi-plus btn-icon-prepend"></i> </i> <?php echo e(__('message.add')); ?></a>
            </a>
>>>>>>> c3f256cc52c6a03f5afe56aedf47760d9b3b5583
            <div class="table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
<<<<<<< HEAD
<<<<<<< HEAD
                            <th><?php echo e(trans('message.no')); ?></th>
                            <th><?php echo e(trans('message.fund_name')); ?></th>
                            <th><?php echo e(trans('message.fund_type')); ?></th>
                            <th><?php echo e(trans('message.fund_level')); ?></th>
                            <!-- <th>Create by</th> -->
                            <th><?php echo e(trans('message.action')); ?></th>
=======
=======
>>>>>>> c3f256cc52c6a03f5afe56aedf47760d9b3b5583
                        <th><?php echo e(__('message.no')); ?></th>
                        <th><?php echo e(__('message.fund_name')); ?></th>
                        <th><?php echo e(__('message.fund_type')); ?></th>
                        <th><?php echo e(__('message.fund_level')); ?></th>
                        <th><?php echo e(__('message.action')); ?></th>
<<<<<<< HEAD
>>>>>>> 456c3e131f3ead0fef22146c146e83bdfd44b7bc
=======
>>>>>>> c3f256cc52c6a03f5afe56aedf47760d9b3b5583
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($i+1); ?></td>
                            <td><?php echo e(Str::limit($fund->fund_name,80)); ?></td>
                            <td>
                                <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($fund->fund_type); ?>

                                <?php elseif(app()->getLocale() == 'zh'): ?>
                                    <?php echo e($fund->fund_type_cn); ?>

                                <?php else: ?>
                                    <?php echo e($fund->fund_type_en); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($fund->fund_level); ?>

                                <?php elseif(app()->getLocale() == 'zh'): ?>
                                    <?php echo e($fund->fund_level_cn); ?>

                                <?php else: ?>
                                    <?php echo e($fund->fund_level_en); ?>

                                <?php endif; ?>
                            </td>
                            <!-- <td><?php echo e($fund->user->fname_en); ?> <?php echo e($fund->user->lname_en); ?></td> -->

                            <td>
                                <?php echo csrf_field(); ?>
                                <form action="<?php echo e(route('funds.destroy',$fund->id)); ?>" method="POST">
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="<?php echo e(route('funds.show',$fund->id)); ?>"><i class="mdi mdi-eye"></i></a>
                                    </li>
                                    <?php if(Auth::user()->can('update',$fund)): ?>
                                    <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo e(route('funds.edit',Crypt::encrypt($fund->id))); ?>"><i class="mdi mdi-pencil"></i></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(Auth::user()->can('delete',$fund)): ?>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <li class="list-inline-item">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title="Delete"><i class="mdi mdi-delete"></i></button>
                                    </li>


                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            fixedHeader: true,
            language: {
                search: "<?php echo e(__('message.search')); ?>", // Placeholder for the search box
                lengthMenu: "<?php echo e(__('message.show')); ?> _MENU_ <?php echo e(__('message.entries')); ?>", // Text for entries
                info: "<?php echo e(__('message.showing')); ?> _START_ <?php echo e(__('message.to')); ?> _END_ <?php echo e(__('message.of')); ?> _TOTAL_ <?php echo e(__('message.entries')); ?>", // Info text
                infoEmpty: "<?php echo e(__('message.no_entries')); ?>", // Text when there are no entries
                infoFiltered: "(<?php echo e(__('message.filtered_from')); ?> _MAX_ <?php echo e(__('message.entries')); ?>)", // Filtered info
                paginate: {
                    first: "<?php echo e(__('message.first')); ?>", // First page
                    previous: "<?php echo e(__('message.previous')); ?>", // Previous page
                    next: "<?php echo e(__('message.next')); ?>", // Next page
                    last: "<?php echo e(__('message.last')); ?>" // Last page
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Delete Successfully", {
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
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/funds/index.blade.php ENDPATH**/ ?>
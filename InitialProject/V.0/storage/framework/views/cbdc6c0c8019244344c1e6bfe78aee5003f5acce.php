
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('message.book')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('books.create')); ?>"><i class="mdi mdi-plus btn-icon-prepend"></i><?php echo e(__('message.add')); ?> </a>
            <!-- <div class="table-responsive"> -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                        <th><?php echo e(__('message.no')); ?></th>
            <th><?php echo e(__('message.name')); ?></th>
            <th><?php echo e(__('message.year')); ?></th>
            <th><?php echo e(__('message.source')); ?></th>
            <th><?php echo e(__('message.page')); ?></th>
            <th width="280px"><?php echo e(__('message.action')); ?></th>
                        </tr>
                        <thead>
                        <tbody>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($i+1); ?></td>
            <td><?php echo e(Str::limit($paper->ac_name, 50)); ?></td>
            <td><?php echo e(date('Y', strtotime($paper->ac_year)) + 543); ?></td>
            <td><?php echo e(Str::limit($paper->ac_sourcetitle, 50)); ?></td>
            <td><?php echo e($paper->ac_page); ?></td>
            <td>
                <form action="<?php echo e(route('books.destroy', $paper->id)); ?>" method="POST">
                    <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('books.show', $paper->id)); ?>" title="<?php echo e(__('message.view')); ?>">
                        <i class="mdi mdi-eye"></i>
                    </a>

                    <?php if(Auth::user()->can('update', $paper)): ?>
                    <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('books.edit', $paper->id)); ?>" title="<?php echo e(__('message.edit')); ?>">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                    <?php endif; ?>

                    <?php if(Auth::user()->can('delete', $paper)): ?>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" title="<?php echo e(__('message.delete')); ?>">
                        <i class="mdi mdi-delete"></i>
                    </button>
                    <?php endif; ?>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
                </table>
            <!-- </div> -->
            <br>
            
        </div>
    </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            fixedHeader: true,
            language: {
                search: "<?php echo e(__('message.search')); ?>",
                lengthMenu: "<?php echo e(__('message.show')); ?> _MENU_ <?php echo e(__('message.entries')); ?>",
                info: "<?php echo e(__('message.showing')); ?> _START_ <?php echo e(__('message.to')); ?> _END_ <?php echo e(__('message.of')); ?> _TOTAL_ <?php echo e(__('message.entries')); ?>",
                infoEmpty: "<?php echo e(__('message.no_entries')); ?>",
                infoFiltered: "(<?php echo e(__('message.filtered_from')); ?> _MAX_ <?php echo e(__('message.entries')); ?>)",
                paginate: {
                    first: "<?php echo e(__('message.first')); ?>",
                    previous: "<?php echo e(__('message.previous')); ?>",
                    next: "<?php echo e(__('message.next')); ?>",
                    last: "<?php echo e(__('message.last')); ?>"
                }
            }
        });
    });

    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
            title: "<?php echo e(__('message.confirm_delete')); ?>",
            text: "<?php echo e(__('message.delete_warning')); ?>",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("<?php echo e(__('message.delete_success')); ?>", {
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
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/books/index.blade.php ENDPATH**/ ?>
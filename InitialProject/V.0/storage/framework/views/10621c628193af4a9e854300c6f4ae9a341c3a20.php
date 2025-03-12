index.blade.php


<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">

<style>
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }
    body label:not(.input-group-text) {
        margin-top: 10px;
    }
    body .my-select {
        background-color: #EFEFEF;
        color: #212529;
        border: 0 none;
        border-radius: 10px;
        padding: 6px 20px;
        width: 100%;
    }
</style>

<?php $__env->startSection('content'); ?>

<div class="container">
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title text-center"><?php echo e(__('programs.title')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="javascript:void(0)" id="new-program" data-toggle="modal">
                <i class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(__('programs.add')); ?>

            </a>

            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?php echo e(__('programs.name_en')); ?></th>
                        <th><?php echo e(__('programs.degree')); ?></th>
                        <th><?php echo e(__('message.action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="program_id_<?php echo e($program->id); ?>">
                        <td><?php echo e($i+1); ?></td>
                        <td><?php echo e($program->program_name_en); ?></td>
                        <td><?php echo e($program->degree->degree_name_en); ?></td>
                        <td>
                            <a class="btn btn-outline-success btn-sm" id="edit-program" data-id="<?php echo e($program->id); ?>">
                                <i class="mdi mdi-pencil"></i> <?php echo e(__('programs.edit')); ?>

                            </a>
                            <button class="btn btn-outline-danger btn-sm" id="delete-program" data-id="<?php echo e($program->id); ?>">
                                <i class="mdi mdi-delete"></i> <?php echo e(__('programs.delete')); ?>

                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add and Edit program modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="programCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="proForm" action="<?php echo e(route('programs.store')); ?>" method="POST">
                    <input type="hidden" name="pro_id" id="pro_id">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <strong><?php echo e(__('programs.degree')); ?>:</strong>
                        <select id="degree" class="custom-select my-select" name="degree">
                            <?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d->id); ?>"><?php echo e($d->degree_name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <strong><?php echo e(__('programs.department')); ?>:</strong>
                        <select id="department" class="custom-select my-select" name="department">
                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d->id); ?>"><?php echo e($d->department_name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <strong><?php echo e(__('programs.name_th')); ?>:</strong>
                        <input type="text" name="program_name_th" id="program_name_th" class="form-control" placeholder="<?php echo e(__('programs.name_th')); ?>">
                    </div>

                    <div class="form-group">
                        <strong><?php echo e(__('programs.name_en')); ?>:</strong>
                        <input type="text" name="program_name_en" id="program_name_en" class="form-control" placeholder="<?php echo e(__('programs.name_en')); ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" id="btn-save" class="btn btn-primary"><?php echo e(__('programs.submit')); ?></button>
                        <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-danger"><?php echo e(__('programs.cancel')); ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            responsive: true,
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

        $('#new-program').click(function() {
            $('#btn-save').val("create-program");
            $('#program').trigger("reset");
            $('#programCrudModal').html("<?php echo e(__('programs.add')); ?>");
            $('#crud-modal').modal('show');
        });

        $('body').on('click', '#edit-program', function() {
            var program_id = $(this).data('id');
            $.get('programs/' + program_id + '/edit', function(data) {
                $('#programCrudModal').html("<?php echo e(__('programs.edit')); ?>");
                $('#crud-modal').modal('show');
                $('#pro_id').val(data.id);
                $('#program_name_th').val(data.program_name_th);
                $('#program_name_en').val(data.program_name_en);
                $('#degree').val(data.degree_id);
            })
        });

        $('body').on('click', '#delete-program', function(e) {
            var program_id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            e.preventDefault();
            if (confirm("<?php echo e(__('programs.confirm_text')); ?>")) {
                $.ajax({
                    type: "DELETE",
                    url: "programs/" + program_id,
                    data: {
                        "id": program_id,
                        "_token": token,
                    },
                    success: function() {
                        $("#program_id_" + program_id).remove();
                        alert("<?php echo e(__('programs.deleted')); ?>");
                    },
                    error: function() {
                        console.log('Error deleting program');
                    }
                });
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/programs/index.blade.php ENDPATH**/ ?>
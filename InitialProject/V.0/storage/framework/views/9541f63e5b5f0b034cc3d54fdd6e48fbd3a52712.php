

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }
</style>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('message.error')); ?></strong>
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
                <h4 class="card-title"><?php echo e(__('message.add_book')); ?></h4>
                <p class="card-description"><?php echo e(__('message.book_info')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('books.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><?php echo e(__('message.book_name')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" class="form-control" placeholder="<?php echo e(__('message.book_name')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><?php echo e(__('message.publication_place')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_sourcetitle" class="form-control" placeholder="<?php echo e(__('message.publication_place')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><?php echo e(__('message.year')); ?></label>
                        <div class="col-sm-9">
                            <input type="date" name="ac_year" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><?php echo e(__('message.pages')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_page" class="form-control" placeholder="<?php echo e(__('message.pages')); ?>">
                        </div>
                    </div>
                    
                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2"><?php echo e(__('message.submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('books.index')); ?>"><?php echo e(__('message.cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#submit').click(function() {
            $.ajax({
                url: postURL,
                method: "POST",
                data: $('#add_name').serialize(),
                type: 'json',
                success: function(data) {
                    if (data.error) {
                        printErrorMsg(data.error);
                    } else {
                        i = 1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display', 'block');
                        $(".print-error-msg").css('display', 'none');
                        $(".print-success-msg").find("ul").append('<li><?php echo e(__('message.record_inserted')); ?></li>');
                    }
                }
            });
        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $(".print-success-msg").css('display', 'none');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/books/create.blade.php ENDPATH**/ ?>
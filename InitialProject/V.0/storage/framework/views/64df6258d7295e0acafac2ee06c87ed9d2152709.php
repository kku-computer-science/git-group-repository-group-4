
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .dropdown-toggle .filter-option {
        height: 40px;
        width: 400px !important;
        color: #212529;
        background-color: #fff;
        border-width: 0.2;
        border-style: solid;
        border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
        border-radius: 5px;
        padding: 4px 10px;
    }

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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">

            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <div class="col-md-10 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">Add Published Work</h4>
                <p class="card-description">Fill in the research details</p>
                <form class="forms-sample" action="<?php echo e(route('papers.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputpaper_name" class="col-sm-3 col-form-label"><b>Research Publication Source</b></label>
                        <div class="col-sm-9">
                            <select class="selectpicker" multiple data-live-search="true" name="cat[]">
                                <?php $__currentLoopData = $source; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value='<?php echo e($s->id); ?>'><?php echo e($s->source_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_name" class="col-sm-3 col-form-label"><b>Research Title</b></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name" class="form-control" placeholder="Title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputabstract" class="col-sm-3 col-form-label"><b>Abstract</b></label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract" class="form-control form-control-lg" style="height:150px" placeholder="Abstract"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputkeyword" class="col-sm-3 col-form-label"><b>Keyword</b></label>
                        <div class="col-sm-9">
                            <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                            <p class="text-danger">***Each word must be separated by a semicolon (;) followed by a space.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_type" class="col-sm-3 col-form-label"><b>Document Type</b></label>
                        <div class="col-sm-9">
                            <select id='paper_type' class="custom-select my-select" style='width: 200px;' name="paper_type">
                                <option value="" disabled selected> Please specify the type </option>
                                <option value="Journal">Journal</option>
                                <option value="Conference Proceeding">Conference Proceeding</option>
                                <option value="Book Series">Book Series</option>
                                <option value="Book">Book</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_subtype" class="col-sm-3 col-form-label"><b>Document Subtype</b></label>
                        <div class="col-sm-9">
                            <select id='paper_subtype' class="custom-select my-select" style='width: 200px;' name="paper_subtype">
                                <option value="" disabled selected> Please specify the subtype </option>
                                <option value="Article">Article</option>
                                <option value="Conference Paper">Conference Paper</option>
                                <option value="Editorial">Editorial</option>
                                <option value="Book Chapter">Book Chapter</option>
                                <option value="Erratum">Erratum</option>
                                <option value="Review">Review</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpublication" class="col-sm-3 col-form-label"><b>Publication</b></label>
                        <div class="col-sm-9">
                            <select id='publication' class="custom-select my-select" style='width: 200px;' name="publication">
                                <option value="" disabled selected> Please specify the type </option>
                                <option value="International Journal">International Journal</option>
                                <option value="International Book">International Book</option>
                                <option value="International Conference">International Conference</option>
                                <option value="National Conference">National Conference</option>
                                <option value="National Journal"> National Journal</option>
                                <option value="National Book"> National Book</option>
                                <option value="National Magazine">National Magazine</option>
                                <option value="Book Chapter"> Book Chapter</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_sourcetitle" class="col-sm-3 col-form-label"><b>Journal Name</b></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_sourcetitle" class="form-control" placeholder="Source Title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_yearpub" class="col-sm-3 col-form-label"><b>Publication Year</b></label>
                        <div class="col-sm-4">
                            <input type="text" name="paper_yearpub" class="form-control" placeholder="Publication Year">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_doi" class="col-sm-3 col-form-label"><b>DOI</b></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_doi" class="form-control" placeholder="DOI">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputpaper_funder" class="col-sm-3 col-form-label"><b>Funding</b></label>
                        <div class="col-sm-9">
                            <input type="int" name="paper_funder" class="form-control" placeholder="Funder">
                        </div>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo e(route('papers.index')); ?>">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#selUser0").select2()
        $("#head0").select2()

        var i = 0;

        $("#add-btn2").click(function() {

            ++i;
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><option value="">Select User</option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><select id="pos" class="custom-select my-select" style="width: 200px;" name="pos[]"><option value="1">First Author</option><option value="2">Co-Author</option><option value="3">Corresponding Author</option></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">X</i></button></td></tr>'
            );
            $("#selUser" + i).select2()
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;


        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="text" name="fname[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><select id="pos2" class="custom-select my-select" style="width: 200px;" name="pos2[]"><option value="1">First Author</option><option value="2">Co-Author</option><option value="3">Corresponding Author</option></select></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
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
                        $(".print-success-msg").find("ul").append(
                            '<li>Record Inserted Successfully.</li>');
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
<!-- <form action="<?php echo e(route('papers.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="paper_name" class="form-control" placeholder="paper_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Year:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_year" placeholder="paper_year"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>paper_type:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_type" placeholder="paper_type"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>paper_level:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_level" placeholder="paper_level"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>paper_details:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_details" placeholder="paper_details"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div> -->
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/papers/create.blade.php ENDPATH**/ ?>
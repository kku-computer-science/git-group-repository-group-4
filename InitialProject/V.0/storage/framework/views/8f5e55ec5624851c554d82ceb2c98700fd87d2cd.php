

<?php $__env->startSection('content'); ?>
<div class="container">
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
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">สร้างกลุ่มวิจัย</h4>
            <p class="card-description">กรอกข้อมูลแก้ไขรายละเอียดกลุ่มวิจัย</p>
            <form action="<?php echo e(route('researchGroups.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>ชื่อกลุ่มวิจัย (ภาษาไทย)</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="<?php echo e(old('group_name_th')); ?>" class="form-control"
                            placeholder="ชื่อกลุ่มวิจัย (ภาษาไทย)">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b>ชื่อกลุ่มวิจัย (English)</b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="<?php echo e(old('group_name_en')); ?>" class="form-control"
                            placeholder="ชื่อกลุ่มวิจัย (English)">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>คำอธิบายกลุ่มวิจัย (ภาษาไทย)</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" value="<?php echo e(old('group_desc_th')); ?>" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>คำอธิบายกลุ่มวิจัย (English)</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="<?php echo e(old('group_desc_en')); ?>" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>รายละเอียดกลุ่มวิจัย (ภาษาไทย)</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="<?php echo e(old('group_detail_th')); ?>" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>รายละเอียดกลุ่มวิจัย (English)</b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="<?php echo e(old('group_detail_en')); ?>" class="form-control"
                            style="height:90px"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>image</b></p>
                    <div class="col-sm-8">
                        <input type="file" name="group_image" class="form-control" value="<?php echo e(old('group_image')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b>หัวหน้ากลุ่มวิจัย</b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>">
                                <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b>สมาชิกกลุ่มวิจัย</b></p>
                    <div class="col-sm-8">
                        <table class="table" id="dynamicAddRemove">
                            <tr>
                                <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i
                                            class="mdi mdi-plus"></i></button></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary upload mt-5">Submit</button>
                <a class="btn btn-light mt-5" href="<?php echo e(route('researchGroups.index')); ?>"> Back</a>
                </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<!-- <script type="text/javascript">
$("body").on("click",".upload",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            // $("input[name='title']").val('');
            // alert('Image Upload Successfully.');
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };


  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script> -->
<script>
$(document).ready(function() {
    $("#selUser0").select2()
    $("#head0").select2()

    var i = 0;

    $("#add-btn2").click(function() {

        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value="">Select User</option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="fas fa-minus"></i></button></td></tr>'
            );
        $("#selUser" + i).select2()
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/research_groups/create.blade.php ENDPATH**/ ?>
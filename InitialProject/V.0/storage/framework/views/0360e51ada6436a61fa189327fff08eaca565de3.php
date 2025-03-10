
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }

    body label:not(.input-group-text) {
        margin-top: 10px;
    }

    body .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 6px 20px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('message.whoops')); ?>!</strong> <?php echo e(__('message.errors_occurred')); ?><br><br>
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
                <h4 class="card-title"><?php echo e(__('message.title')); ?></h4>
                <p class="card-description"><?php echo e(__('message.description')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('patents.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3"><?php echo e(__('message.name1')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" class="form-control" placeholder="<?php echo e(__('message.name')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_type" class="col-sm-3 "><?php echo e(__('message.type')); ?></label>
                        <div class="col-sm-4">
                            <select id="category" class="custom-select my-select" name="ac_type">
                                <option value="" disabled selected ><?php echo e(__('message.type')); ?></option>
                                <optgroup label="<?php echo e(__('message.patent')); ?>">
                                <option value="สิทธิบัตร"><?php echo e(__('message.patent_general')); ?></option>
                                <option value="สิทธิบัตร (การประดิษฐ์)"><?php echo e(__('message.patent_invention')); ?></option>
                                <option value="สิทธิบัตร (การออกแบบผลิตภัณฑ์)"><?php echo e(__('message.patent_design')); ?></option>
                            </optgroup>

                            <optgroup label="<?php echo e(__('message.petty_patent')); ?>">
                                <option value="อนุสิทธิบัตร"><?php echo e(__('message.petty_patent')); ?></option>
                            </optgroup>

                            <optgroup label="<?php echo e(__('message.copyright')); ?>">
                                <option value="ลิขสิทธิ์"><?php echo e(__('message.copyright')); ?></option>
                                <option value="ลิขสิทธิ์ (วรรณกรรม)"><?php echo e(__('message.copyright_literary')); ?></option>
                                <option value="ลิขสิทธิ์ (ดนตรีกรรม)"><?php echo e(__('message.copyright_music')); ?></option>
                                <option value="ลิขสิทธิ์ (ภาพยนตร์)"><?php echo e(__('message.copyright_film')); ?></option>
                                <option value="ลิขสิทธิ์ (ศิลปกรรม)"><?php echo e(__('message.copyright_art')); ?></option>
                                <option value="ลิขสิทธิ์ (งานแพร่เสียงแพร่ภาพ)"><?php echo e(__('message.copyright_broadcast')); ?></option>
                                <option value="ลิขสิทธิ์ (โสตทัศนวัสดุ)"><?php echo e(__('message.copyright_audio_visual')); ?></option>
                                <option value="ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)"><?php echo e(__('message.copyright_other')); ?></option>
                                <option value="ลิขสิทธิ์ (สิ่งบันทึกเสียง)"><?php echo e(__('message.copyright_sound_recording')); ?></option>
                            </optgroup>

                            <optgroup label="<?php echo e(__('other')); ?>">
                                <option value="ความลับทางการค้า"><?php echo e(__('message.trade_secret')); ?></option>
                                <option value="เครื่องหมายการค้า"><?php echo e(__('message.trademark')); ?></option>
                            </optgroup>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3 "><?php echo e(__('message.register_date')); ?></label>
                        <div class="col-sm-4">
                            <input type="date" name="ac_year" class="form-control" placeholder="ac_year">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_refnumber" class="col-sm-3 "><?php echo e(__('message.registration_number')); ?></label>
                        <div class="col-sm-4">
                            <input type="text" name="ac_refnumber" class="form-control" placeholder="เลขทะเบียน">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_doi" class="col-sm-3 "><?php echo e(__('message.lecturers')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="dynamicAddRemove">
                                    <tr>
                                        <td><select id='selUser0' style='width: 200px;' name="moreFields[0][userid]">
                                                <option value=''><?php echo e(__('message.select_user')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                                </option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </td>
                                        <td><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />-->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="exampleInput" class="col-sm-3 ">บุคลลภายนอก</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="fname[]" placeholder="Enter Author FName" class="form-control name_list" /></td>
                                        <td><input type="text" name="lname[]" placeholder="Enter Author LName" class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row ">
                        <label for="exampleInputpaper_doi" class="col-sm-3 "><?php echo e(__('message.external_persons')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        
                                        <th><?php echo e(__('message.name')); ?></th>
                                        <th><?php echo e(__('message.last_name')); ?></th>
                                        <!-- <th>Email Id</th> -->
                                            <!-- <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button> -->
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore2" title="Add More Person"><i class="mdi mdi-plus"></i></span></a></th>
                                    <tr>
                                        <!--  -->
                                        <td><input type="text" name="fname[]" class="form-control" placeholder="ชื่อ" ></td>
                                        <td><input type="text" name="lname[]" class="form-control" placeholder="นามสกุล" ></td>
                                        <!-- <td><input type="text" name="emailid[]" class="form-control"></td> -->
                                        <td><a href='javascript:void(0);' class='remove'><span><i class="mdi mdi-minus"></span></a></td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2"><?php echo e(__('message.submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('patents.index')); ?>"><?php echo e(__('message.cancel')); ?></a>
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
                '][userid]"  style="width: 200px;"><option value="">Select User</option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">X</i></button></td></tr>'
            );
            $("#selUser" + i).select2()
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });
</script>
<script>
        $(document).ready(function() {
            $('#addMore2').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                data.find("input").val('');
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if (trIndex > 1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("Sorry!! Can't remove first row!");
                }
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
                '" class="dynamic-added"><td><input type="text" name="fname[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/patents/create.blade.php ENDPATH**/ ?>
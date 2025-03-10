
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
        </div>
    </div>

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
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(__('message.edit_published_research')); ?></h4>
                <p class="card-description"><?php echo e(__('message.enter_research_details')); ?>Enter Research Details</p>
                <form class="forms-sample" action="<?php echo e(route('papers.update',$paper->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <p class="col-sm-3"><b><?php echo e(__('message.research_publication_source')); ?>

                        </b></p>
                        <div class="col-sm-8">
                            <?php echo Form::select('sources[]', $sources, $paperSource, array('class' => 'selectpicker','multiple data-live-search'=>"true")); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_name" class="col-sm-3 col-form-label"><?php echo e(__('message.research_title')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_name" value="<?php echo e($paper->paper_name); ?>" class="form-control" placeholder="<?php echo e(__('message.research_title')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputabstract" class="col-sm-3 col-form-label"><?php echo e(__('message.abstract')); ?></label>
                        <div class="col-sm-9">
                            <textarea type="text" name="abstract" placeholder="abstract" class="form-control form-control-lg" style="height:150px" ><?php echo e($paper->abstract); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputkeyword" class="col-sm-3 col-form-label"><?php echo e(__('message.keyword')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="keyword" value="<?php echo e($paper->keyword); ?>" class="form-control" placeholder="keyword">
                            <p class="text-danger"><?php echo e(__('message.***Each keyword must be separated by a semicolon (;) followed by a space')); ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_sourcetitle" class="col-sm-3 col-form-label"> <?php echo e(__('message.journal_name')); ?> </label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_sourcetitle" value="<?php echo e($paper->paper_sourcetitle); ?>" class="form-control" placeholder="<?php echo e(__('message.journal_name')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_type" class="col-sm-3 col-form-label"><?php echo e(__('message.document_type')); ?> </label>
                        <div class="col-sm-9">
                            <select id='paper_type' class="custom-select my-select" style='width: 200px;' name="paper_type">
                                <option value="Journal" <?php echo e("Journal" == $paper->paper_type ? 'selected' : ''); ?>><?php echo e(__('message.journal')); ?></option>
                                <option value="Conference Proceeding" <?php echo e("Conference Proceeding" == $paper->paper_type ? 'selected' : ''); ?>><?php echo e(__('message.Conference Proceeding')); ?></option>
                                <option value="Book Series" <?php echo e("Book Series" == $paper->paper_type ? 'selected' : ''); ?>><?php echo e(__('message.Book Series')); ?></option>
                                <option value="Book" <?php echo e("Book" == $paper->paper_type ? 'selected' : ''); ?>><?php echo e(__('message.book')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_subtype" class="col-sm-3 col-form-label"><?php echo e(__('message.document_subtype')); ?> </label>
                        <div class="col-sm-9">
                        <select name="paper_subtype">
                            <option value="Article" <?php echo e("Article" == $paper->paper_subtype ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Article')); ?>

                            </option>
                            <option value="Conference Paper" <?php echo e("Conference Paper" == $paper->paper_subtype ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Conference Paper')); ?>

                            </option>
                            <option value="Editorial" <?php echo e("Editorial" == $paper->paper_subtype ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Editorial')); ?>

                            </option>
                            <option value="Book Chapter" <?php echo e("Book Chapter" == $paper->paper_subtype ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Book Chapter')); ?>

                            </option>
                            <option value="Erratum" <?php echo e("Erratum" == $paper->paper_subtype ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Erratum')); ?>

                            </option>
                            <option value="Review" <?php echo e("Review" == $paper->paper_subtype ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Review')); ?>

                            </option>
                        </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpublication" class="col-sm-3 col-form-label"><?php echo e(__('message.publication')); ?></label>
                        <div class="col-sm-9">
                        <select id='publication' class="custom-select my-select" style='width: 200px;' name="publication">
                            <option value="International Journal" <?php echo e("International Journal" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.International Journal')); ?>

                            </option>
                            <option value="International Book" <?php echo e("International Book" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.International Book')); ?>

                            </option>
                            <option value="International Conference" <?php echo e("International Conference" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.International Conference')); ?>

                            </option>
                            <option value="National Conference" <?php echo e("National Conference" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.National Conference')); ?>

                            </option>
                            <option value="National Journal" <?php echo e("National Journal" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.National Journal')); ?>

                            </option>
                            <option value="National Book" <?php echo e("National Book" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.National Book')); ?>

                            </option>
                            <option value="National Magazine" <?php echo e("National Magazine" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.National Magazine')); ?>

                            </option>
                            <option value="Book Chapter" <?php echo e("Book Chapter" == $paper->publication ? 'selected' : ''); ?>>
                                <?php echo e(__('message.Book Chapter')); ?>

                            </option>
                        </select>

                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="exampleInputpaper_url" class="col-sm-3 col-form-label">Url</label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_url" value="<?php echo e($paper->paper_url); ?>" class="form-control" placeholder="paper_url">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="exampleInputpaper_yearpub" class="col-sm-3 col-form-label"><?php echo e(__('message.year_of_publication')); ?>

                        </label>
                        <div class="col-sm-9">
                            <input type="number" name="paper_yearpub" value="<?php echo e($paper->paper_yearpub); ?>" class="form-control" placeholder="<?php echo e(__('message.year')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_volume" class="col-sm-3 col-form-label"><?php echo e(__('message.journal_volume')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_volume" value="<?php echo e($paper->paper_volume); ?>" class="form-control" placeholder="<?php echo e(__('message.journal_volume')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_issue" class="col-sm-3 col-form-label"><?php echo e(__('message.issue_number')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_issue" value="<?php echo e($paper->paper_issue); ?>" class="form-control" placeholder="<?php echo e(__('message.issue_number')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_citation" class="col-sm-3 col-form-label"><?php echo e(__('message.citation')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_citation" value="<?php echo e($paper->paper_citation); ?>" class="form-control" placeholder="<?php echo e(__('message.citation')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_page" class="col-sm-3 col-form-label"><?php echo e(__('message.page_number')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_page" value="<?php echo e($paper->paper_page); ?>" class="form-control" placeholder="<?php echo e(__('message.page_number')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_doi" class="col-sm-3 col-form-label"><?php echo e(__('message.doi')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_doi" value="<?php echo e($paper->paper_doi); ?>" class="form-control" placeholder="<?php echo e(__('message.doi')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_funder" class="col-sm-3 col-form-label"><?php echo e(__('message.funding_support')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_funder" value="<?php echo e($paper->paper_funder); ?>" class="form-control" placeholder="<?php echo e(__('message.funding_support')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_url" class="col-sm-3 col-form-label"><?php echo e(__('message.url')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="paper_url" value="<?php echo e($paper->paper_url); ?>" class="form-control" placeholder="<?php echo e(__('message.url')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_doi" class="col-sm-3 "><?php echo e(__('message.author_name_internal')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table " id="dynamicAddRemove">
                                    <tr>
                                        <td><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm "><i class="mdi mdi-plus"></i></button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputpaper_author" class="col-sm-3 col-form-label"><?php echo e(__('message.author_name_external')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">

                                    <tr>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>

                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('message.submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('papers.index')); ?>"><?php echo e(__('message.cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>

</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    var messages = {
        select_user: "<?php echo e(__('message.select_user')); ?>",
        first: "<?php echo e(__('message.first')); ?>",
        co: "<?php echo e(__('message.co')); ?>",
        corresponding: "<?php echo e(__('message.corresponding')); ?>",
        remove: "<?php echo e(__('message.remove')); ?>"
    };
</script>

<script>
    $(document).ready(function() {

        $("#head0").select2()
        $("#fund").select2()
        //$("#selUser0").select2()
        var papers = <?php echo $paper['teacher']; ?>;
        var i = 0;
        console.log(papers);
        for (i = 0; i < papers.length; i++) {
            var obj = papers[i];
//console.log(obj.pivot.author_type)

$("#dynamicAddRemove").append(
    '<tr>' +
        '<td>' +
            '<select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;">' +
                '<option value="">' + messages.select_user + '</option>' +
                '<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>' +
                    '<option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>' +
                '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' +
            '</select>' +
        '</td>' +
        '<td>' +
            '<select id="pos' + i + '" class="custom-select my-select" style="width: 200px;" name="pos[]">' +
                '<option value="1">' + messages.first + '</option>' +
                '<option value="2">' + messages.co + '</option>' +
                '<option value="3">' + messages.corresponding + '</option>' +
            '</select>' +
        '</td>' +
        '<td>' +
            '<button type="button" class="btn btn-danger btn-sm remove-tr">' +
                '<i class="mdi mdi-minus"></i> ' + messages.remove +
            '</button>' +
        '</td>' +
    '</tr>'
);
            document.getElementById("selUser" + i).value = obj.id;
            document.getElementById("pos" + i).value = obj.pivot.author_type;
            $("#selUser" + i).select2()


            //document.getElementById("#dynamicAddRemove").value = "10";
        }


        $("#add-btn2").click(function() {
i++
            $("#dynamicAddRemove").append(
    '<tr>' +
        '<td>' +
            '<select id="selUser' + i + '" name="moreFields[' + i + '][userid]" style="width: 200px;">' +
                '<option value="">' + messages.select_user + '</option>' +
                '<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>' +
                    '<option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option>' +
                '<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' +
            '</select>' +
        '</td>' +
        '<td>' +
            '<select id="pos' + i + '" class="custom-select my-select" style="width: 200px;" name="pos[]">' +
                '<option value="1">' + messages.first + '</option>' +
                '<option value="2">' + messages.co + '</option>' +
                '<option value="3">' + messages.corresponding + '</option>' +
            '</select>' +
        '</td>' +
        '<td>' +
            '<button type="button" class="btn btn-danger btn-sm remove-tr">' +
                '<i class="mdi mdi-minus"></i> ' + messages.remove +
            '</button>' +
        '</td>' +
    '</tr>'
);

            $("#selUser" + i).select2()
        });


        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });

    $(document).ready(function() {
        var patent = <?php echo $paper->author; ?>;

        var postURL = "<?php echo url('addmore'); ?>";
        var i = 0;
        //console.log(patent)

        for (i = 0; i < patent.length; i++) {
            //console.log(patent);
            var obj2 = patent[i];
            console.log(obj2.pivot.author_type)
            $("#dynamic_field").append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="text" name="fname[]" value="' + obj2.author_fname + '" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="lname[]" value="' + obj2.author_lname + '" placeholder="Enter your Name" class="form-control name_list" /></td><td><select id="poss' + i + '" class="custom-select my-select" style="width: 200px;" name="pos2[]"><option value="1"><?php echo e(__("message.first")); ?></option><option value="2"><?php echo e(__("message.co")); ?></option><option value="3"><?php echo e(__("message.corresponding")); ?></option></select></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
            //document.getElementById("selUser" + i).value = obj.id;
            //console.log(obj.author_fname)
            // let doc=document.getElementById("row" + i)
            // doc.setAttribute('fname','aaa');
            // doc.setAttribute('lname','bbb');
            //document.getElementById("row" + i).value = obj.author_lname;
            //document.getAttribute("lname").value = obj.author_lname;
            //$("#selUser" + i).select2()
            document.getElementById("poss" + i).value = obj2.pivot.author_type;

            //document.getElementById("#dynamicAddRemove").value = "10";
        }

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="text" name="fname[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><select id="poss' + i + '"class="custom-select my-select" style="width: 200px;" name="pos2[]"><option value="1"><?php echo e(__("message.first")); ?></option><option value="2"><?php echo e(__("message.co")); ?></option><option value="3"><?php echo e(__("message.corresponding")); ?></option></select></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>

<?php $__env->stopSection(); ?>
<!-- <form action="<?php echo e(route('papers.update',$paper->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="<?php echo e($paper->name); ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"><?php echo e($paper->detail); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form> -->
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/papers/edit.blade.php ENDPATH**/ ?>
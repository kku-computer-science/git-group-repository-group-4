
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
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
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">Edit Book Details</h4>
                <p class="card-description">Fill in the book details</p>
                <form class="forms-sample" action="<?php echo e(route('books.update',$book->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3 col-form-label">Book Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" value="<?php echo e($book->ac_name); ?>" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_sourcetitle" class="col-sm-3 col-form-label">Publication Location</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_sourcetitle" value="<?php echo e($book->ac_sourcetitle); ?>" class="form-control" placeholder="Publication Location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3 col-form-label">Publication Year (B.E.)</label>
                        <div class="col-sm-9">
                            <input type="date" name="ac_year" value="<?php echo e($book->ac_year); ?>" class="form-control" placeholder="Publication Year (B.E.)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_page" class="col-sm-3 col-form-label">Number of Pages</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_page" value="<?php echo e($book->ac_page); ?>" class="form-control" placeholder="Number of Pages">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo e(route('books.index')); ?>" >Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<!-- <form action="<?php echo e(route('papers.update',$book->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="<?php echo e($book->name); ?>" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"><?php echo e($book->detail); ?></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form> --> 

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/books/edit.blade.php ENDPATH**/ ?>
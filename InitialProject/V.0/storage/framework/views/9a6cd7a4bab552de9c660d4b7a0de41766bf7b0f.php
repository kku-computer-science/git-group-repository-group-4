

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(__('message.journal_details')); ?></h4>
            <p class="card-description"><?php echo e(__('message.journal_info')); ?></p>

            <div class="row mt-3">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.title')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_name); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.abstract')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->abstract); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.keyword')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->keyword); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.journal_type')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_type); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.document_type')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_subtype); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.publication')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->publication); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.authors')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 1): ?>
                            <b><?php echo e(__('first_author')); ?>:</b> <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 1): ?>
                            <b><?php echo e(__('first_author')); ?>:</b> <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 2): ?>
                            <b><?php echo e(__('co_author')); ?>:</b> <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 2): ?>
                            <b><?php echo e(__('co_author')); ?>:</b> <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $paper->author; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 3): ?>
                            <b><?php echo e(__('corresponding_author')); ?>:</b> <?php echo e($teacher->author_fname); ?> <?php echo e($teacher->author_lname); ?> <br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $paper->teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($teacher->pivot->author_type == 3): ?>
                            <b><?php echo e(__('corresponding_author')); ?>:</b> <?php echo e($teacher->fname_en); ?> <?php echo e($teacher->lname_en); ?> <br>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.source_title')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_sourcetitle); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.year_published')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_yearpub); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.volume')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_volume); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.issue')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_issue); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.page_number')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_page); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.doi')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->paper_doi); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(__('message.url')); ?></b></p>
                <a href="<?php echo e($paper->paper_url); ?>" target="_blank" class="card-text col-sm-9"><?php echo e($paper->paper_url); ?></a>
            </div>

            <a class="btn btn-primary mt-5" href="<?php echo e(route('papers.index')); ?>"> <?php echo e(__('message.back')); ?></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/papers/show.blade.php ENDPATH**/ ?>
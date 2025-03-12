

<?php $__env->startSection('content'); ?>
<div class="container card-2">
    <p class="title"><?php echo e(__('message.Researchers')); ?></p>

    <!-- ช่องค้นหานักวิจัย -->
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="<?php echo e(route('researchers.search')); ?>">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch"
                            placeholder="<?php echo e(__('message.Researchinterests')); ?>" value="<?php echo e(request('textsearch')); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary"><?php echo e(__('message.Search')); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- ผลลัพธ์การค้นหานักวิจัย -->
        <!-- รายชื่อนักวิจัย -->
<div class="researcher-container">
    <!-- 🔹 ส่วนแสดง "นักวิจัย" -->
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="researcher-item">
            <div class="card researcher-card" data-field="<?php echo e($r->program_id); ?>">
                <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>" class="researcher-link">
                    <div class="row">
                        <!-- 🔹 รูปโปรไฟล์ -->
                        <div class="col-sm-4">
                            <img class="card-image" src="<?php echo e($r->picture ?? asset('img/default_profile.png')); ?>" 
                                alt="<?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?>">
                        </div>

                        <!-- 🔹 ข้อมูลนักวิจัย -->
                        <div class="col-sm-8 overflow-hidden">
                                <div class="card-body">
                                <h5 class="card-title">
                                <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($r->fname_th); ?> <?php echo e($r->lname_th); ?> <!-- ใช้ชื่อภาษาไทย -->
                                <?php else: ?>
                                    <?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?> <!-- ใช้ชื่อภาษาอังกฤษ -->
                                <?php endif; ?>,
                                <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($r->position_th); ?> <!-- ใช้ระดับการศึกษาเป็นภาษาไทย -->
                                <?php else: ?>
                                    <?php echo e($r->doctoral_degree); ?> <!-- ใช้ระดับการศึกษาเป็นภาษาอังกฤษ -->
                                <?php endif; ?>
                            </h5>
                            <h5 class="card-title-2">
                            <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($r->academic_ranks_th); ?> <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาไทย -->
                                <?php elseif(app()->getLocale() == 'en'): ?>
                                    <?php echo e($r->academic_ranks_en); ?> <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาอังกฤษ -->
                                <?php else: ?>
                                    <?php echo e($r->academic_ranks_cn); ?>

                                <?php endif; ?>
                            </h5>
                                <!-- 🔹 แสดงสาขาวิจัย -->

                                <div class="card-expertise">
                                    <p class="card-text">
                                        <?php if(app()->getLocale() == 'th'): ?>
                                            <?php echo e($r->program->program_name_th); ?>

                                        <?php elseif(app()->getLocale() == 'en'): ?>
                                            <?php echo e($r->program->program_name_en); ?>

                                        <?php else: ?>
                                            <?php echo e($r->program->program_name_cn); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="researcher-container">
    <!-- 🔹 ส่วนแสดง "นักศึกษา" -->
    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="researcher-item">
            <div class="card researcher-card" data-field="<?php echo e($s->program_id); ?>">
                <a href="<?php echo e(route('detail', Crypt::encrypt($s->id))); ?>" class="researcher-link">
                    <div class="row">
                        <!-- 🔹 รูปโปรไฟล์ -->
                        <div class="col-sm-4">
                            <img class="card-image" src="<?php echo e($s->picture ?? asset('img/default_profile.png')); ?>" 
                                alt="<?php echo e($s->fname_en); ?> <?php echo e($s->lname_en); ?>">
                        </div>

                        <!-- 🔹 ข้อมูลนักศึกษา -->
                        <div class="col-sm-8 overflow-hidden">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php if(app()->getLocale() == 'th'): ?>
                                        <?php echo e($s->fname_th); ?> <?php echo e($s->lname_th); ?>   
                                    <?php else: ?>
                                        <?php echo e($s->fname_en); ?> <?php echo e($s->lname_en); ?>  
                                    <?php endif; ?>
                                </h5>
                                <h5 class="card-title-2">
                                <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($s->academic_ranks_th); ?> <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาไทย -->
                                <?php elseif(app()->getLocale() == 'en'): ?>
                                    <?php echo e($s->academic_ranks_en); ?> <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาอังกฤษ -->
                                <?php else: ?>
                                    <?php echo e($s->academic_ranks_cn); ?>

                                <?php endif; ?>
                            </h5>
                                <!-- 🔹 แสดงโปรแกรมที่เรียน -->

                                <div class="card-expertise">
                                    <p class="card-text">
                                    <?php if(app()->getLocale() == 'th'): ?>
                                            <?php echo e($s->program->program_name_th); ?>

                                        <?php elseif(app()->getLocale() == 'zh'): ?>
                                            <?php echo e($s->program->program_name_cn); ?>

                                        <?php elseif(app()->getLocale() == 'en'): ?>
                                            <?php echo e($s->program->program_name_en); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<style>
    .researcher-container {
        display: grid;
        grid-template-columns: repeat(2, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
        justify-items: center;
        align-items: start;
    }

    .researcher-item {
        width: 100%;
    }

    .researcher-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        width: 100%;
    }

    .researcher-card:hover {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .researcher-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/researchers.blade.php ENDPATH**/ ?>
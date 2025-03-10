
<?php $__env->startSection('content'); ?>
<div class="container card-3 ">
    <p><?php echo e(__('message.ResearchGroup')); ?></p>
    <?php $__currentLoopData = $resg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="<?php echo e(asset('img/'.$rg->group_image)); ?>" alt="...">
                    <h2 class="card-text-1"> <?php echo e(__('message.Laboratory Supervisor')); ?> </h2>
                    
                    <h2 class="card-text-2">
                        <?php $__currentLoopData = $rg->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($r->hasRole('teacher')): ?> <!-- เช็คว่า user นี้มี role เป็น teacher -->
                                <?php if(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.'): ?>
                                    <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>, Ph.D.
                                    <br>
                                <?php elseif(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer'): ?>
                                    <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>

                                     <br>
                                <?php elseif(app()->getLocale() == 'en' and $r->doctoral_degree == 'Ph.D.'): ?>
                                    <?php echo e(str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()})); ?> <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>, Ph.D.
                                    <br>
                                <?php else: ?>                            
                                    <?php echo e($r->{'position_'.app()->getLocale()}); ?> <?php echo e($r->{'fname_'.app()->getLocale()}); ?> <?php echo e($r->{'lname_'.app()->getLocale()}); ?>

                                    <br>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo e($rg->{'group_name_'.app()->getLocale()}); ?></>
                    </h5>
                    <h3 class="card-text"><?php echo e(Str::limit($rg->{'group_desc_'.app()->getLocale()}, 350)); ?>

                    </h3>
                </div>
                <!-- Show Research Focus -->
                <div class="card-body">
                    <!-- แก้ไขหัวข้อให้แสดงเป็นภาษาไทยหรืออังกฤษ -->
                    <h5 class="card-title">
                        <?php if(app()->getLocale() == 'en'): ?>
                            Main Research Areas/Topics
                        <?php else: ?>
                            หัวข้อวิจัยที่เป็นจุดเน้นของกลุ่ม
                        <?php endif; ?>
                    </h5>
                    <ul class="card-text-2">
                        <?php $__currentLoopData = $rg->researchFocus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $focus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($focus->research_topic_en); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div>
                    <a href="<?php echo e(route('researchgroupdetail',['id'=>$rg->id])); ?>"
                        class="btn btn-outline-info"><?php echo e(trans('message.details')); ?></a>
                </div>
                
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/research_g.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<div class="container card-2">
    <p class="title"><?php echo e(__('message.Researchers')); ?></p>

    <!-- Dropdown สำหรับกรองประเภทนักวิจัย -->
    <div class="mb-3">
    <select class="form-select" id="programFilter" onchange="filterResearchers()">
    <option value="all"><?php echo e(__('message.All')); ?></option> <!-- แปลข้อความ "All" -->
    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($program->id); ?>">
            <?php if(app()->getLocale() == 'th'): ?>
                <?php echo e($program->program_name_th); ?> <!-- แสดงชื่อโปรแกรมภาษาไทยเมื่อ locale เป็น 'th' -->
            <?php else: ?>
                <?php echo e($program->program_name_en); ?> <!-- แสดงชื่อโปรแกรมภาษาอังกฤษเมื่อ locale เป็น 'en' -->
            <?php endif; ?>
        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
    </div>

    <!-- Search Bar -->
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="<?php echo e(route('researchers')); ?>">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="<?php echo e(__('message.Researchinterests')); ?>"
                            value="<?php echo e(request('textsearch')); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary"><?php echo e(__('message.Search')); ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- รายชื่อนักวิจัย -->
    <div class="researcher-container">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="researcher-item">
                <div class="card researcher-card" data-field="<?php echo e($r->program_id); ?>">
                    <a href="<?php echo e(route('detail', Crypt::encrypt($r->id))); ?>" class="researcher-link">
                        <!-- <p class="debug-text">DEBUG: <?php echo e($r->program_id); ?></p> Debug -->
                        <div class="row">
                            <div class="col-sm-4">
                                <img class="card-image" src="<?php echo e($r->picture ?? asset('img/default_profile.png')); ?>"
                                    alt="<?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?>">
                            </div>
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
                                <?php else: ?>
                                    <?php echo e($r->academic_ranks_en); ?> <!-- ใช้ตำแหน่งทางวิชาการเป็นภาษาอังกฤษ -->
                                <?php endif; ?>
                            </h5>
                                    <p class="card-text-1"><?php echo e(__('message.Research Field')); ?></p>
                                    <div class="card-expertise">
                                        <p class="card-text">
                                            <?php if(app()->getLocale() == 'th'): ?>
                                                <?php echo e($r->program->program_name_th); ?> <!-- แสดงชื่อโปรแกรมภาษาไทย -->
                                            <?php else: ?>
                                                <?php echo e($r->program->program_name_en); ?> <!-- แสดงชื่อโปรแกรมภาษาอังกฤษ -->
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

</div>

<!-- JavaScript สำหรับกรองข้อมูล -->
<script>
    function filterResearchers() {
        let dropdown = document.getElementById('programFilter');
        let selectedProgramId = dropdown.value;
        let researchers = document.querySelectorAll('.researcher-item');

        researchers.forEach(item => {
            let researcherField = item.querySelector('.researcher-card').getAttribute('data-field');

            if (selectedProgramId === "all" || researcherField === selectedProgramId) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }

</script>

<!-- CSS -->
<style>
    .researcher-container {
        display: grid;
        grid-template-columns: repeat(2, minmax(300px, 1fr));
        /* แถวละ 2 คน */
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

    /* ปรับขนาด dropdown */
    #programFilter {
        font-size: 0.875rem;
        /* ลดขนาดฟอนต์ */
        padding: 0.375rem 0.75rem;
        /* ลดระยะห่างภายใน */
        max-width: 200px;
        /* กำหนดความกว้างสูงสุด */
    }


    @media (max-width: 768px) {
        .researcher-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/researchers.blade.php ENDPATH**/ ?>
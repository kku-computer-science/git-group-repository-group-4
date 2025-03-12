
<?php $__env->startSection('content'); ?>

<div class="container refund">
    <p><?php echo e(__('message.Academic topics/research projects')); ?></p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;"><?php echo e(__('message.no')); ?></th>
                    <th class="col-md-1" style="font-weight: bold;"><?php echo e(__('message.year')); ?></th>
                    <th class="col-md-4" style="font-weight: bold;"><?php echo e(__('message.Project name')); ?> </th>
                    <!-- <th>ระยะเวลาโครงการ</th>
                    <th>ผู้รับผิดชอบโครงการ</th>
                    <th>ประเภททุนวิจัย</th>
                    <th>หน่วยงานที่สนันสนุนทุน</th>
                    <th>งบประมาณที่ได้รับจัดสรร</th> -->
                    <th class="col-md-4" style="font-weight: bold;"><?php echo e(__('message.details')); ?></th>
                    <th class="col-md-2" style="font-weight: bold;"><?php echo e(__('message.Project Manager')); ?></th>
                    <!-- <th class="col-md-5">หน่วยงานที่รับผิดชอบ</th> -->
                    <th class="col-md-1" style="font-weight: bold;"><?php echo e(__('message.status')); ?></th>
                </tr>
            </thead>


            <tbody>
                <?php $__currentLoopData = $resp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="vertical-align: top;text-align: left;"><?php echo e($i + 1); ?></td>
                        <td style="vertical-align: top;text-align: left;"><?php echo e(($re->project_year) + 543); ?></td>
                        <td style="vertical-align: top;text-align: left;">
                            <?php echo e($re->project_name); ?>


                        </td>
                        <td>
                            <div style="padding-bottom: 10px">
                                <?php if($re->project_start != null): ?>
                                    <span style="font-weight: bold;">
                                        <?php echo e(__('message.project_duration')); ?>

                                    </span>
                                    <span style="padding-left: 10px;">
                                        <?php if(app()->getLocale() === 'th'): ?>
                                            <?php echo e(\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y')); ?> ถึง
                                            <?php echo e(\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y')); ?>

                                        <?php elseif(app()->getLocale() === 'zh'): ?>
                                            <?php echo e(\Carbon\Carbon::parse($re->project_start)->format('Y年m月d日')); ?> 至
                                            <?php echo e(\Carbon\Carbon::parse($re->project_end)->format('Y年m月d日')); ?>

                                        <?php else: ?>
                                            <?php echo e(\Carbon\Carbon::parse($re->project_start)->format('j F Y')); ?> to
                                            <?php echo e(\Carbon\Carbon::parse($re->project_end)->format('j F Y')); ?>

                                        <?php endif; ?>
                                    </span>
                                <?php else: ?>
                                    <span style="font-weight: bold;">
                                        <?php echo e(__('message.project_duration')); ?>

                                    </span>
                                    <span></span>
                                <?php endif; ?>
                            </div>


                            <!-- <?php if($re->project_start != null): ?>
                                <td><?php echo e(\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y')); ?><br>ถึง <?php echo e(\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y')); ?></td>
                                <?php else: ?>
                                <td></td>
                                <?php endif; ?> -->

                            <!-- <td><?php $__currentLoopData = $re->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($user->position); ?><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td> -->
                            <!-- <td>
                                    <?php if(is_null($re->fund)): ?>
                                    <?php else: ?>
                                    <?php echo e($re->fund->fund_type); ?>

                                    <?php endif; ?>
                                </td> -->
                            <!-- <td><?php if(is_null($re->fund)): ?>
                                    <?php else: ?>
                                    <?php echo e($re->fund->support_resource); ?>

                                    <?php endif; ?>
                                </td> -->
                            <!-- <td><?php echo e($re->budget); ?></td> -->
                            <div style="padding-bottom: 10px;">
                                <span style="font-weight: bold;"><?php echo e(__('message.research_funding_type')); ?></span>
                                <span style="padding-left: 10px;"> <?php if(is_null($re->fund)): ?>
                                <?php else: ?>
                                    <?php echo e(__('message.funds.' . $re->fund->fund_type)); ?>

                                    <!--<?php echo e($re->fund->fund_type); ?>-->
                                <?php endif; ?></span>
                            </div>
                            <div style="padding-bottom: 10px;">
                                <span style="font-weight: bold;"><?php echo e(__('message.supporting_agency')); ?></span>
                                <span style="padding-left: 10px;"> <?php if(is_null($re->fund)): ?>
                                <?php else: ?>
                                    <?php echo e($re->fund->support_resource); ?>

                                <?php endif; ?></span>
                            </div>
                            <div style="padding-bottom: 10px;">
                                <span style="font-weight: bold;"><?php echo e(__('message.responsible_unit')); ?></span>
                                <span style="padding-left: 10px;">
                                    <?php echo e(__('message.department.' . $re->responsible_department)); ?>

                                    <!--<?php echo e($re->responsible_department); ?>-->
                                </span>
                            </div>
                            <div style="padding-bottom: 10px;">

                                <span style="font-weight: bold;"><?php echo e(__('message.allocated_budget')); ?></span>
                                <span style="padding-left: 10px;"> <?php echo e(number_format($re->budget)); ?>

                                    <?php echo e(__('message.currency')); ?></span>
                            </div>
                        </td>

                        <td style="vertical-align: top;text-align: left;">
                            <div style="padding-bottom: 10px;">
                                <span>
                                    <?php $__currentLoopData = $re->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(App::getLocale() == 'th'): ?>
                                            <?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?><br>
                                        <?php else: ?>
                                            <?php echo e($user->position_en); ?> <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?><br>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                            </div>
                        </td>
                        <?php if($re->status == 1): ?>
                            <td style="vertical-align: top;text-align: left;">
                                <h6><label class="badge badge-success"><?php echo e(__('message.application_submission')); ?></label></h6>
                            </td>
                        <?php elseif($re->status == 2): ?>
                            <td style="vertical-align: top;text-align: left;">
                                <h6><label class="badge bg-warning text-dark"><?php echo e(__('message.implementation')); ?></label></h6>
                            </td>
                        <?php else: ?>
                            <td style="vertical-align: top;text-align: left;">
                                <h6><label class="badge bg-dark"><?php echo e(__('message.project_closure')); ?></label>
                                    <h6>
                            </td>
                        <?php endif; ?>
                        <!-- <td></td>
                                <td></td> -->
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function () {
        // ตรวจสอบค่าภาษา (สมมติว่าคุณใช้ `App::getLocale()` หรือค่าจาก HTML)
        var currentLang = $('html').attr('lang'); // หรือคุณสามารถดึงค่าจากที่อื่น

        // ตั้งค่าภาษา
        var languageSettings = {
            en: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching records found",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "No entries available",
                infoFiltered: "(filtered from _MAX_ total entries)",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },
            th: {
                search: "ค้นหา:",
                lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
                zeroRecords: "ไม่พบข้อมูลที่ต้องการ",
                info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                infoEmpty: "ไม่มีข้อมูล",
                infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
                paginate: {
                    first: "หน้าแรก",
                    last: "หน้าสุดท้าย",
                    next: "ถัดไป",
                    previous: "ก่อนหน้า"
                }
            },
            zh: {
                search: "搜索:",
                lengthMenu: "显示 _MENU_ 条记录",
                zeroRecords: "未找到匹配的记录",
                info: "显示 _START_ 到 _END_ 的 _TOTAL_ 条记录",
                infoEmpty: "没有可用的记录",
                infoFiltered: "(从 _MAX_ 条记录中过滤)",
                paginate: {
                    first: "首页",
                    last: "末页",
                    next: "下一页",
                    previous: "上一页"
                }
            }
        };

        // ใช้ค่าภาษาให้เหมาะสม
        var table1 = $('#example1').DataTable({
            responsive: true,
            language: languageSettings[currentLang] || languageSettings['en'] // Default เป็นอังกฤษ
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\git-group-repository-group-4\InitialProject\V.0\resources\views/research_proj.blade.php ENDPATH**/ ?>
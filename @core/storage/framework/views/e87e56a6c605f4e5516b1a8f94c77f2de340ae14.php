<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    $statistics = [
        ['title' => 'Total Admin','value' => $total_admin, 'icon' => 'user'],
        ['title' => 'Total User','value' => $total_user, 'icon' => 'user'],
        ['title' => 'Total Blogs','value' => $all_blogs, 'icon' => 'write'],
        ['title' => 'Total Testimonial','value' => $total_testimonial, 'icon' => 'control-forward'],
        ['title' => 'Total Team Member','value' => $total_team_member, 'icon' => 'control-forward'],
        ['title' => 'Total Counterup','value' => $total_counterup, 'icon' => 'control-forward'],
        ['title' => 'Total Jobs','value' => $total_jobs, 'icon' => 'package'],
        ['title' => 'Total Events','value' => $total_events, 'icon' => 'timer'],
        ['title' => 'Total Causes','value' => $total_causes, 'icon' => 'agenda'],
        ['title' => 'Total Causes Logs','value' => $total_cause_logs, 'icon' => 'medall'],
        ['title' => 'Total Event Attendence','value' => $total_event_attendance, 'icon' => 'hand-open'],
        ['title' => 'Total Campaign Withdraws','value' => $campaign_withdraw, 'icon' => 'package'],
    ];
?>

    <div class="main-content-inner">
        <div class="row">
            <!-- seo fact area start -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Raised Per Month In")); ?> <?php echo e(date('Y')); ?></h2>
                            <canvas id="monthlyRaised"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Raised Per Day In Last 30Days")); ?></h2>
                           <div>
                               <canvas id="monthlyRaisedPerDay"></canvas>
                           </div>
                        </div>
                    </div>
                    <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card card-hover">
                            <div class="dash-box text-white">
                                <h1 class="dash-icon">
                                    <i class="ti-<?php echo e($data['icon']); ?> mb-1 font-16"></i>
                                </h1>
                                <div class="dash-content">
                                    <h5 class="mb-0 mt-1"><?php echo e($data['value']); ?></h5>
                                    <small class="font-light"><?php echo e(__($data['title'])); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="row">

          <div class="col-lg-6">
            <div class="card margin-top-40">
                <div class="smart-card">
                    <h4 class="title"><?php echo e(__('Recent Donation Logs')); ?></h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th><?php echo e(__('Donation ID')); ?></th>
                            <th><?php echo e(__('Amount')); ?></th>
                            <th><?php echo e(__('Payment Gateway')); ?></th>
                            <th><?php echo e(__('Payment Status')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $causes_recent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>#<?php echo e($data->id); ?></td>
                                    <td><?php echo e(amount_with_currency_symbol($data->amount)); ?></td>
                                    <td><?php echo e(str_replace('_',' ',$data->payment_gateway)); ?></td>
                                    <td>
                                        <?php $pay_status = $data->status; ?>
                                        <?php if($pay_status == 'complete'): ?>
                                            <span class="alert alert-success"><?php echo e($pay_status); ?></span>
                                        <?php elseif($pay_status == 'pending'): ?>
                                            <span class="alert alert-warning"><?php echo e($pay_status); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(date_format($data->created_at,'d M Y h:i:s')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-lg-6">
                <div class="card margin-top-40">
                    <div class="smart-card">
                        <h4 class="title"><?php echo e(__('Recent Event Attendance Order')); ?></h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <th><?php echo e(__('Attendance ID')); ?></th>
                                <th><?php echo e(__('Event Name')); ?></th>
                                <th><?php echo e(__('Payment Status')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $event_attendance_recent_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>#<?php echo e($data->id); ?></td>
                                        <td><?php echo e($data->event_name); ?></td>

                                        <td>
                                            <?php $pay_status = $data->payment_status; ?>
                                            <?php if($pay_status == 'complete'): ?>
                                                <span class="alert alert-success"><?php echo e($pay_status); ?></span>
                                            <?php elseif($pay_status == 'pending'): ?>
                                                <span class="alert alert-warning"><?php echo e($pay_status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date_format($data->created_at,'d M Y h:i:s')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/chart.js')); ?>"></script>
    <script>
        $.ajax({
            url: '<?php echo e(route('admin.home.chat.data')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token : "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                 labels = data.labels;
                 chartdata = data.data;
                 new Chart(
                    document.getElementById('monthlyRaised'),
                    {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__('Amount Raised')); ?>',
                                backgroundColor: '#fcb11a',
                                borderColor: '#f5cb62',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
        $.ajax({
            url: '<?php echo e(route('admin.home.chat.data.by.day')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token : "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyRaisedPerDay'),
                    {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__('Amount Raised')); ?>',
                                backgroundColor: '#15771f',
                                borderColor: '#acefd3',
                                data: data.data,
                            }]
                        }
                    }
                );
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/backend/admin-home.blade.php ENDPATH**/ ?>
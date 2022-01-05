<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="contatiner">
        <!-- banner -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="profile">
                    <div class="img-circle float-start">
                        <?php echo render_image_markup_by_attachment_id( optional(Auth::guard('web')->user())->image); ?>

                    </div>

                    <span class="float-start"><span class="statusDonatur"><?php echo e(optional(Auth::guard('web')->user())->name); ?></span>
                </div>
            </div>
        </div>
        <!-- /banner -->

        <!-- saldo -->
        <div class="row mb-25">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto wrapSaldo">
                <div class="saldo p-2">
                    <!-- <img src="img/gopay-saldo.png" class="img-fluid float-start gopayLogo" alt="Donasi - Donatur" width="50"> -->

                    <span class="float-start saldoText">Saldo anda</span><br><span class="jumlahSaldo">Rp 0</span>
                    <a href="" class="btn btn-success"><i class="bi bi-plus-lg plus-lg-icon"></i> Isi saldo</a>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-warning" target="_blank"> <?php echo e(__('Home')); ?></a>
                </div>
            </div>
        </div>
        <!-- /saldo -->


        <!-- menuProfile -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto menuProfile">
                <ul>
                    <li><a href="<?php echo e(route('user.home')); ?>"><img src="<?php echo e(asset('assets/frontend/img/pengaturan.png')); ?>" class="img-fluid" alt="Donasi - Profile"> <?php echo e(__('Dashboard')); ?>

                    <i class="bi bi-chevron-right chevron-right-icon float-end pr-25"></i></a></li>

                    <?php if(!empty(get_static_option('donations_module_status'))): ?>
                    <li><a href="<?php echo e(route('user.home.donations')); ?>"><img src="<?php echo e(asset('assets/frontend/img/faq.png')); ?>" class="img-fluid" alt="Donasi - Profile">
                            <?php echo e(__('All ')); ?> <?php echo e(get_static_option('donation_page_name')); ?> <i class="bi bi-chevron-right chevron-right-icon float-end pr-25"></i></a>
                    </li>
                    <?php endif; ?>

                    <li><a href="<?php echo e(route('user.campaign.all')); ?>"><img src="<?php echo e(asset('assets/frontend/img/hubungi.png')); ?>" class="img-fluid"
                         alt="Donasi - Profile"> <?php echo e(__('Campaign List')); ?><i class="bi bi-chevron-right chevron-right-icon float-end pr-25"></i></a>
                    </li>

                    <li><a href="<?php echo e(route('user.campaign.log.withdraw')); ?>"><img src="<?php echo e(asset('assets/frontend/img/tentang.png')); ?>" class="img-fluid" alt="Donasi-Profile">
                    <?php echo e(__('Withdraw Logs')); ?><i class="bi bi-chevron-right chevron-right-icon float-end pr-25"></i></a>
                    </li>

                    <li><a href="<?php echo e(route('user.home.support.tickets')); ?>"><img src="<?php echo e(asset('assets/frontend/img/pengaturan.png')); ?>"
                     class="img-fluid " alt="Donasi - Profile">
                     <?php echo e(__('All')); ?> <?php echo e(get_static_option('support_ticket_page_name')); ?></a>
                    </li>

                    <li><a href="<?php echo e(route('user.home.edit.profile')); ?>"><img src="<?php echo e(asset('assets/frontend/img/pengaturan.png')); ?>" class="img-fluid" alt="Donasi - Profile"> <?php echo e(__('Edit Profile')); ?></a></li>
                    <li><a href="<?php echo e(route('user.home.change.password')); ?>"><img src="<?php echo e(asset('assets/frontend/img/pengaturan.png')); ?>" class="img-fluid " alt="Donasi - Profile"> <?php echo e(__('Change Password')); ?></a></li>
                    <li><a href="<?php echo e(route('frontend.user.logout')); ?>"><img src="<?php echo e(asset('assets/frontend/img/keluar.png')); ?>" class="img-fluid d-inline-block pr-2" alt="Donasi - Profile"><?php echo e(__('Logout')); ?></a></li>
                </ul>
            </div>
        </div>


        <div class="container">
            <div class="row mt-5 pt-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto wrapSaldo">
                    <div class="message-show margin-top-10">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                    </div>
                    <?php echo $__env->yieldContent('section'); ?>
                </div>
            </div>
        </div>





        <!-- /menuProfile -->

        <!-- menu bottom -->































































    </div>


































































<?php $__env->stopSection(); ?>














<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/user-master.blade.php ENDPATH**/ ?>
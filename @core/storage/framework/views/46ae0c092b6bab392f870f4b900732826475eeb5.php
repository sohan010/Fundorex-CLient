<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Register')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="contatiner">

        <!-- logo -->
        <div class="row mb-25 pl-25 pr-15">
            <nav class="navbar sticky-top navbar-white bg-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                    <a href="<?php echo e(url('/')); ?>">
                        <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                    </a>
                </div>
        </div>
        </nav>
    </div>
    <!-- /logo -->

    <!-- form -->
    <div class="row mb-10 pt-4 pl-25 pr-15 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <h4>Daftar akun anda</h4>
            <h6>Yuk berdonasi</h6>

            <?php echo $__env->make('backend.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

            <form action="<?php echo e(route('user.register')); ?>" class="formDaftar mt-35" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control">

                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control">

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">

                <label for="password" class="form-label">Password Confirm</label>
                <input type="password" id="password" name="password_confirmation" class="form-control">

                <div class="d-grid gap-2 pt-4">
                    <button type="submit" class="btn btn-lg btn-success d-block">Daftar</button>
                </div>

            </form>

            <div class="text-center pt-4">Sudah punya akun? <a href="<?php echo e(route('user.login')); ?>">Yuk Masuk</a></div>

            <div class="d-grid gap-2 pt-4">
                <a href="<?php echo e(route('login.google.redirect')); ?>" type="button" class="btn btn-outline-danger"><i class="bi bi-google google-icon"></i> Daftar menggunakan Google</a>
                <a href="<?php echo e(route('login.facebook.redirect')); ?>" type="button" class="btn btn-outline-primary"><i class="bi bi-facebook facebook-icon"></i> Daftar menggunakan Facebook</a>
            </div>
        </div>
    </div>
    <!-- /form -->


    </div>











    



















































<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("<?php echo e(get_static_option('site_google_captcha_v3_site_key')); ?>", {action: 'homepage'}).then(function(token) {
                document.getElementById('gcaptcha_token').value = token;
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/register.blade.php ENDPATH**/ ?>
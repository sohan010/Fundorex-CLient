<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="contatiner">

        <!-- logo -->
        <div class="row mb-25 pl-25 pr-15">
            <nav class="navbar sticky-top navbar-white bg-white">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto ">
                    <a href="<?php echo e(url('/')); ?>">
                        <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                    </a>
                </div>
        </div>
        </nav>
    </div>
    <!-- /logo -->

    <!-- form -->
    <div class="row mb-100 pt-4 pl-25 pr-25 m-0">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
            <h4>Masuk ke akun anda</h4>
            <h6>Yuk berdonasi</h6>

            <form action="<?php echo e(route('user.login')); ?>" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">
                <?php echo csrf_field(); ?>
                <div class="error-wrap"></div>

                <label for="text" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">


                <div class="d-grid gap-2 pt-4">
                    <button id="login_btn"  type="submit" class="btn btn-lg btn-success d-block">Masuk</button>
                </div>

            </form>

            <div class="text-center pt-4">Belum punya akun? <a href="<?php echo e(route('user.register')); ?>">Yuk Daftar</a></div>
            <div class="text-center pt-4"> <a href="<?php echo e(route('user.forget.password')); ?>"><?php echo e(__('Forgot Password?')); ?></a></div>


            <div class="d-grid gap-2 mt-5 pt-5">
                <a href="<?php echo e(route('login.google.redirect')); ?>" type="button" class="btn btn-outline-danger"><i class="bi bi-google google-icon"></i> Masuk menggunakan Google</a>
                <a href="<?php echo e(route('login.facebook.redirect')); ?>" type="button" class="btn btn-outline-primary"><i class="bi bi-facebook facebook-icon"></i> Masuk menggunakan Facebook</a>
            </div>
        </div>
    </div>
    <!-- /form -->


    </div>





















































<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        (function($){
            "use strict";
            $(document).on('click', '#login_btn', function (e) {
                e.preventDefault();
                var formContainer = $('#login_form_order_page');
                var el = $(this);
                var username = formContainer.find('input[name="username"]').val();
                var password = formContainer.find('input[name="password"]').val();
                var remember = formContainer.find('input[name="remember"]').val();

                el.text('<?php echo e(__("Please Wait")); ?>');

                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('user.ajax.login')); ?>",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        username : username,
                        password : password,
                        remember : remember,
                    },
                    success: function (data){
                        if(data.status == 'invalid'){
                            el.text('<?php echo e(__("Login")); ?>')
                            formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                        }else{
                            formContainer.find('.error-wrap').html('');
                            el.text('<?php echo e(__("Login Success.. Redirecting ..")); ?>');
                            location.reload();
                        }
                    },
                    error: function (data){
                        var response = data.responseJSON.errors;
                        formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                        $.each(response,function (value,index){
                            formContainer.find('.error-wrap ul').append('<li>'+index+'</li>');
                        });
                        el.text('<?php echo e(__("Login")); ?>');
                    }
                });
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/login.blade.php ENDPATH**/ ?>
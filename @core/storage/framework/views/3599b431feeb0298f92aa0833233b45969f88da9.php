<?php $title = $title ?? __('Login To Leave Comment'); ?>
<div class="login-form">
    <p><?php echo e($title); ?></p>

    <div class="login-form">
        <form action="<?php echo e(route('user.login')); ?>" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">
            <?php echo csrf_field(); ?>
            <div class="error-wrap"></div>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="<?php echo e(__('Username')); ?>">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>">
            </div>
            <div class="form-group btn-wrapper">
                <button type="submit" id="login_btn" class="submit-btn"><?php echo e(__('Login')); ?></button>
            </div>
            <div class="row mb-4 rmber-area">
                <div class="col-6">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                        <label class="custom-control-label" for="remember"><?php echo e(__('Remember Me')); ?></label>
                    </div>
                </div>
                <div class="col-6 text-right">
                    <a class="d-block" href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Create New account?')); ?></a>
                    <a href="<?php echo e(route('user.forget.password')); ?>"><?php echo e(__('Forgot Password?')); ?></a>
                </div>
                <div class="col-lg-12">
                    <div class="social-login-wrap">
                        <?php if(get_static_option('enable_facebook_login')): ?>
                            <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="facebook"><i class="fab fa-facebook-f"></i> <?php echo e(__('Login With Facebook')); ?></a>
                        <?php endif; ?>
                        <?php if(get_static_option('enable_google_login')): ?>
                            <a href="<?php echo e(route('login.google.redirect')); ?>" class="google"><i class="fab fa-google"></i> <?php echo e(__('Login With Google')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/partials/ajax-user-login-markup.blade.php ENDPATH**/ ?>
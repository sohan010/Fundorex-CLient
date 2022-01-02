<?php if(auth()->check()): ?>
    <?php
        $route = auth()->guest() == 'admin' ? route('admin.home') : route('user.home');
    ?>
    <li class="volunteer"><a href="<?php echo e($route); ?>"><?php echo e(__('Dashboard')); ?></a>  <span>/</span>
        <a href="<?php echo e(route('user.logout')); ?>"
           onclick="event.preventDefault();document.getElementById('logout_submit_btn__').dispatchEvent(new MouseEvent('click'))">
            <?php echo e(__('Logout')); ?>

        </a>
        <form id="userlogout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
            <button id="logout_submit_btn__" type="submit"></button>
        </form>
    </li>
<?php else: ?>
    <li class="volunteer"><a href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a> <span>/</span> <a href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register')); ?></a></li>
<?php endif; ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/components/front-user-login-li.blade.php ENDPATH**/ ?>
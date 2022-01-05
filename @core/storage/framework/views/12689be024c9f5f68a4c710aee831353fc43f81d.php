
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Withdraw Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
 <div class="form-header-wrap margin-bottom-20 d-flex justify-content-between">
     <h3 class="mb-3"><?php echo e(__('Withdraw Details')); ?></h3>
     <a href="<?php echo e(route('user.campaign.log.withdraw')); ?>"
        class="btn btn-info btn-sm mb-3 campaign-title" ><?php echo e(__('All Withdraw')); ?></a>
 </div>
  <div class="table-wrap table-responsive all-user-campaign-table">
      <ul class="margin-top-20">
          <li><strong><?php echo e(__('Cause')); ?>:</strong> <?php echo e(optional($withdraw->cause)->title ?? __('untitled')); ?> </li>
          <li><strong><?php echo e(__('Requested By')); ?>:</strong> <?php echo e(optional($withdraw->user)->name); ?> (<?php echo e(optional($withdraw->user)->username); ?>)</li>
          <?php if($withdraw->payment_status === 'pending'): ?>
              <li><strong><?php echo e(__('Raised Amount')); ?>:</strong> <?php echo e(amount_with_currency_symbol(optional($withdraw->cause)->raised ?? 0)); ?></li>
              <li><strong><?php echo e(__('Available For Withdraw Amount')); ?>:</strong><?php echo e(amount_with_currency_symbol(optional($withdraw->cause)->raised - optional($withdraw->cause)->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum())); ?> </li>
          <?php endif; ?>
          <li><strong><?php echo e(__('Requested Withdraw Amount')); ?>:</strong> <?php echo e(amount_with_currency_symbol($withdraw->withdraw_request_amount)); ?> </li>
          <li><strong><?php echo e(__('Payment Gateway')); ?>:</strong> <?php echo e($withdraw->payment_gateway); ?> </li>
          <li><strong><?php echo e(__('Payment Status')); ?>:</strong> <?php echo e($withdraw->payment_status); ?> </li>
          <li><strong><?php echo e(__('Request Date')); ?>:</strong> <?php echo e($withdraw->created_at->format('D, d M Y')); ?> </li>
          <?php if($withdraw->payment_status === 'approved'): ?>
              <li><strong><?php echo e(__('Approved Date')); ?>:</strong> <?php echo e($withdraw->updated_at->format('D, d M Y')); ?> </li>
          <?php endif; ?>
          <li><strong><?php echo e(__('Payment Account Details ')); ?>:</strong> <?php echo e($withdraw->payment_account_details); ?> </li>
          <li><strong><?php echo e(__('Additional Comment by You')); ?>:</strong> <?php echo e($withdraw->additional_comment_by_user); ?> </li>
      </ul>
      <h3 class="header-title margin-top-40"><?php echo e(__('Admin Response')); ?></h3>
      <ul class="margin-top-20">
          <li><strong><?php echo e(__('Transaction Id')); ?>:</strong> <?php echo e($withdraw->transaction_id); ?> </li>
          <li><strong><?php echo e(__('Payment Receipt')); ?>:</strong>
              <?php if($withdraw->payment_receipt && file_exists('assets/uploads/donation-withdraw/'.$withdraw->payment_receipt)): ?>
                  <a href="<?php echo e(asset('assets/uploads/donation-withdraw/'.$withdraw->payment_receipt)); ?>" download=""><?php echo e($withdraw->payment_receipt); ?></a>
              <?php else: ?>
                  <?php echo e($withdraw->payment_receipt); ?>

              <?php endif; ?>
          </li>
          <li><strong><?php echo e(__('Payment information')); ?>:</strong> <?php echo e($withdraw->payment_information); ?> </li>
          <li><strong><?php echo e(__('Additional Comment by Admin')); ?>:</strong> <?php echo e($withdraw->additional_comment_by_admin); ?> </li>
      </ul>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/campaigns/withdraw-view.blade.php ENDPATH**/ ?>
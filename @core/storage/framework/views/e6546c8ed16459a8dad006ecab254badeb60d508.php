
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.css','data' => []]); ?>
<?php $component->withName('datatable.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Campaigns')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
 <div class="form-header-wrap margin-bottom-50 d-flex justify-content-between">
     <h3 class="mb-3"><?php echo e(__('All Campaigns List')); ?></h3>
     <a href="<?php echo e(route('user.campaign.new')); ?>"
        class="btn btn-info btn-sm mb-3 campaign-title" ><?php echo e(__('Create New Campaign')); ?></a>
 </div>
  <div class="table-wrap table-responsive all-user-campaign-table">
      <table class="table table-defaul" id="all_blog_table">
          <thead class="bg-dark text-light" style="margin-bottom:20px;">
          <th><?php echo e(__('Info')); ?></th>
          <th><?php echo e(__('Action')); ?></th>
          </thead>
          <tbody>
          <?php $__currentLoopData = $all_donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td>
                     <div class="campaign-image-wrap margin-bottom-25">
                         <?php echo render_image_markup_by_attachment_id($data->image,null,'thumb'); ?>

                     </div>
                      <ul>
                          <li><strong><?php echo e(__('Title')); ?>:</strong> <?php echo e($data->title); ?></li>
                          <li><strong><?php echo e(__('featured')); ?>:</strong> <?php if($data->featured): ?> <?php echo e(__('Yes')); ?> <?php else: ?> <?php echo e(__('No')); ?> <?php endif; ?>
                          </li>
                          <li><strong><?php echo e(__('Goal')); ?>:</strong> <?php echo e(amount_with_currency_symbol($data->amount)); ?></li>
                          <?php
                              $withdraw_able_amount_without_admin_charge = $data->raised;
                             $charge_text = '';
                             $donation_charge_form = get_static_option('donation_charge_form');
                             if ($donation_charge_form === 'campaign_owner'){
                                 $charge_text = __('after admin charge applied');
                                 echo '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                                 $withdraw_able_amount_without_admin_charge -= \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
                             }
                          ?>
                          <li><strong><?php echo e(__('Raised')); ?>:</strong> <?php echo e(amount_with_currency_symbol($withdraw_able_amount_without_admin_charge)); ?></li>
                          <li><strong><?php echo e(__('Withdraw')); ?>:</strong> <?php echo e(amount_with_currency_symbol($data->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum())); ?></li>
                          <li><strong><?php echo e(__('Created At')); ?>:</strong> <?php echo e(date("d - M - Y", strtotime($data->created_at))); ?></li>

                          <li><strong><?php echo e(__('Status')); ?>:</strong>
                              <div class="status-wrap mt-3 my-2">
                                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.status-span','data' => ['status' => $data->status]]); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->status)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                              </div>
                          </li>
                      </ul>
                  </td>
                  <td>

                    <a href="<?php echo e(route('user.campaign.edit',$data->id)); ?>"
                       class="btn btn-primary text-white btn-sm"><i class="fas fa-edit"></i>
                    </a>
                    <a tabindex="0" class="btn btn-danger btn-sm swal_delete_button text-light">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form method='post' action='<?php echo e(route('user.campaign.delete',$data->id)); ?>' class="d-none">
                    <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                    <br>
                    <button type="submit" class="swal_form_submit_btn d-none"></button>
                     </form>

                    <a href="<?php echo e(route('frontend.donations.single',$data->slug)); ?>"
                       class="btn btn-dark text-white btn-sm my-2" target="_blank"> <i class="fa fa-eye"></i>
                    </a>

                  <a href="<?php echo e(route('user.all.update.cause.page',$data->id)); ?>"
                      class="btn btn-info text-white btn-sm"><?php echo e(__('Add/Edit Update About Cause')); ?>

                  </a>

                  </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
      </table>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>

    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                
                $(document).on('click','.mobile_nav',function(e){
                  e.preventDefault(); 
                   $(this).parent().toggleClass('show');
               });
               
              $(document).on('click','.swal_delete_button',function(e){
                e.preventDefault();
                  Swal.fire({
                    title: '<?php echo e(__("Are you sure?")); ?>',
                    text: '<?php echo e(__("You would not be able to revert this item!")); ?>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      $(this).next().find('.swal_form_submit_btn').trigger('click');
                    }
                  });
              });
            })


        })(jQuery)
    </script>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.js','data' => []]); ?>
<?php $component->withName('datatable.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/campaigns/all-campaigns.blade.php ENDPATH**/ ?>
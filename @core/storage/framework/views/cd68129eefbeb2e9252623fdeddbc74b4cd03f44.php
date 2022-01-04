<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/bootstrap.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div class="heading-wrap d-flex justify-content-between margin-bottom-25">
        <h4 class="title"><?php echo e(__('All Withdraws')); ?></h4>
        <div class="btn-wrapper">
            <a href="#" data-toggle="modal" data-target="#donation_withdraw_modal" class="btn btn-info mb-3"><?php echo e(__('New Withdraw')); ?></a>
        </div>
    </div>
    <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"><?php echo e(__('Information')); ?></th>
                    <th scope="col"> <?php echo e(__('Withdraw Status')); ?></th>
                    <th scope="col"><?php echo e(__('Actions')); ?></th>
                </tr>
                </thead>
                <tbody>

                  <?php $__currentLoopData = $withdraw_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <ul>
                                <li><strong><?php echo e(__("Cause")); ?>:</strong> <?php echo e($data->cause->title); ?></li>
                                <li><strong><?php echo e(__("Amount")); ?>:</strong> <?php echo e(amount_with_currency_symbol($data->withdraw_request_amount)); ?></li>
                                <li><strong><?php echo e(__("Payment Gateway")); ?>:</strong> <?php echo e($data->payment_gateway); ?></li>
                                <?php
                                    $withdraw_able_amount_without_admin_charge = optional($data->cause)->raised - optional($data->cause)->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum();
                                   $charge_text = '';
                                   $donation_charge_form = get_static_option('donation_charge_form');
                                   if ($donation_charge_form === 'campaign_owner'){
                                       $charge_text = __('after admin charge applied');
                                       echo '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                                       $withdraw_able_amount_without_admin_charge -= \App\Helpers\DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
                                   }
                                ?>
                                <li><strong><?php echo e(__('Available For Withdraw').' '.$charge_text); ?>:</strong><?php echo e(amount_with_currency_symbol($withdraw_able_amount_without_admin_charge)); ?> </li>
                            </ul>
                        </td>
                        <td><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.status-span','data' => ['status' => $data->payment_status]]); ?>
<?php $component->withName('status-span'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data->payment_status)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?></td>
                        <td>
                            <a href="<?php echo e(route('user.campaign.withdraw.view',$data->id)); ?>" target="_blank" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <div class="blog-pagination">
         <?php echo e($withdraw_logs->links()); ?>

    </div>

    
    <div class="modal fade" id="donation_withdraw_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4><?php echo e(__('User Campaign Donation Withdraw')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('user.campaign.withdraw.submit')); ?>" method="post" id="donation_withdraw_form">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_id" value="" id="user_id">
                        <div class="withdraw_modal_msg_wrap" ></div>
                        <div class="form-group">
                            <label for="edit_name"><?php echo e(__('Select Cause')); ?></label>
                            <select class="form-control" name="cause_id">
                                <option value=""><?php echo e(__("select cause")); ?></option>
                                <?php $__currentLoopData = $causes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cause): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cause->id); ?>"><?php echo e($cause->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="field_wrap d-none">
                            <div class="form-group">
                                <label for="edit_name"><?php echo e(__('Withdraw Amount')); ?></label>
                                <input type="number" class="form-control" name="withdraw_request_amount" id="withdraw_amount">
                                <div id="withdraw_able_amount_wrap"></div>
                            </div>
                            <div class="form-group">
                                <label for="edit_name"><?php echo e(__('Payment Gateway')); ?></label>
                                <select class="form-control" name="payment_gateway">
                                    <?php echo render_payment_gateway_select(); ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="edit_name"><?php echo e(__('Payment Account Details')); ?></label>
                                <textarea name="payment_account_details" cols="4" rows="4" class="form-control"></textarea>
                                <span class="info-text"><?php echo e(__('enter your selected payment gateway account details, where admin will send your withdrawal amount')); ?></span>
                            </div>

                            <div class="form-group">
                                <label for="edit_name"><?php echo e(__('Additional Comment ')); ?></label>
                                <textarea name="additional_comment_by_user" cols="4" rows="4" class="form-control"></textarea>
                                <span class="info-text"><?php echo e(__('leave any additional comment if you have any')); ?></span>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/common/js/bootstrap.min.js')); ?>"></script>
    <script>
      <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.submit','data' => []]); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
      (function($){
        "use strict";

        $(document).ready(function(){
            
       $(document).on('click','.mobile_nav',function(e){
          e.preventDefault(); 
           $(this).parent().toggleClass('show');
       });
               
        var withdrawAbleAmount = 0;

        $(document).on('keyup','input[name="withdraw_request_amount"]',function (){
            var value = $(this).val();
            var formContainer = $('#donation_withdraw_form');
            var amountWrap = $('#withdraw_able_amount_wrap');

            if(value <= withdrawAbleAmount){
                amountWrap.find('.text-danger').remove();
                formContainer.find('button[type="submit"]').attr('disabled',false);
            }else{
                amountWrap.find('.text-danger').remove();
                amountWrap.append('<p class="text-danger"><?php echo e(__('you can not withdraw more than')); ?> '+withdrawAbleAmount+'<?php echo e(get_static_option('site_global_currency')); ?></p>');
                formContainer.find('button[type="submit"]').attr('disabled',true);
            }
        });

        $(document).on('change','select[name="cause_id"]',function (){
            var modalForm = $('#donation_withdraw_form');

            var causeID = $(this).val();
            $.ajax({
               type: 'POST',
               url: "<?php echo e(route('user.campaign.withdraw.check')); ?>",
               data: {
                   id: causeID,
                   _token : "<?php echo e(csrf_token()); ?>"
               },
               success: function (data){
                   withdrawAbleAmount = data.available_amount;
                   if (data.available_amount > 0){
                       modalForm.find('.field_wrap').removeClass('d-none').addClass('d-block');
                       modalForm.find('#withdraw_able_amount_wrap').html('<p class="text-success text-capitalize"><?php echo e(__('withdraw able balance')); ?> '+data.available_amount+'<?php echo e(get_static_option('site_global_currency')); ?></p><p class="text-warning text-capitalize"> '+data.admin_charge+'<?php echo e(get_static_option('site_global_currency')); ?> <?php echo e(__('Admin Charge Applied.')); ?></p>');
                   }else{
                       modalForm.find('.withdraw_modal_msg_wrap').html('');
                       modalForm.find('.withdraw_modal_msg_wrap').append('<p class="text-danger text-capitalize"><?php echo e(__('does not have amount to withdraw from this cause')); ?></p>');
                       modalForm.find('.field_wrap').removeClass('d-block').addClass('d-none');
                   }
               }
            });
        });

        })
      })(jQuery);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\fundorex-indonesian-client\@core\resources\views/frontend/user/dashboard/campaigns/campaign-log-withdraw.blade.php ENDPATH**/ ?>
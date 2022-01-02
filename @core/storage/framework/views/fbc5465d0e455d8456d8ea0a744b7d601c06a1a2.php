<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('support_ticket_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('support_ticket_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('about_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('about_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="support-ticket-page-area padding-top-120 padding-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                   <div class="support-ticket-wrapper">
                       <?php if(auth()->guard('web')->check()): ?>
                           <h3 class="title"><?php echo e(get_static_option('support_ticket_form_title')); ?></h3>
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
                           <form action="<?php echo e(route('frontend.support.ticket.store')); ?>" method="post" class="support-ticket-form-wrapper" enctype="multipart/form-data">
                               <?php echo csrf_field(); ?>
                               <input type="hidden" name="via" value="<?php echo e(__('website')); ?>">
                                <div class="form-group">
                                    <label><?php echo e(__('Title')); ?></label>
                                    <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('Title')); ?>">
                                </div>
                               <div class="form-group">
                                   <label><?php echo e(__('Subject')); ?></label>
                                    <input type="text" class="form-control" name="subject" placeholder="<?php echo e(__('Subject')); ?>">
                                </div>
                               <div class="form-group">
                                   <label><?php echo e(__('Priority')); ?></label>
                                   <select name="priority" class="form-control">
                                       <option value="low"><?php echo e(__('Low')); ?></option>
                                       <option value="medium"><?php echo e(__('Medium')); ?></option>
                                       <option value="high"><?php echo e(__('High')); ?></option>
                                       <option value="urgent"><?php echo e(__('Urgent')); ?></option>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label><?php echo e(__('Departments')); ?></label>
                                   <select name="department_id" class="form-control">
                                       <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($dep->id); ?>"><?php echo e($dep->name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label><?php echo e(__('Description')); ?></label>
                                   <textarea name="description"class="form-control" cols="30" rows="10" placeholder="<?php echo e(__('Description')); ?>"></textarea>
                               </div>
                              <div class="btn-wrapper text-center">
                                  <button type="submit"><?php echo e(get_static_option('support_ticket_button_text')); ?></button>
                              </div>
                           </form>
                       <?php else: ?>
                           <?php echo $__env->make('frontend.partials.ajax-login-form',['title' => get_static_option('support_ticket_login_notice')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                       <?php endif; ?>
                   </div>
               </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('frontend.partials.ajax-login-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/pages/support-ticket/support-ticket.blade.php ENDPATH**/ ?>
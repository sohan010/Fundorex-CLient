
<div class="tab-area-new">
    <div class="author-data-tab">
        <ul class="tabs">
            <?php if(get_static_option('donation_descriptions_show_hide')): ?>
                 <li class="active" data-tab="tab-one"> <?php echo e(__('Description')); ?> </li>
            <?php endif; ?>
           <?php if(get_static_option('donation_faq_show_hide')): ?>
            <li data-tab="tab-two"> <?php echo e(__('FAQ')); ?> </li>
           <?php endif; ?>
         <?php if(get_static_option('donation_updates_show_hide')): ?>
            <li data-tab="tab-three"> <?php echo e(__('Updates')); ?> </li>
         <?php endif; ?>
            <li data-tab="tab-four"> <?php echo e(__('Comments')); ?> </li>
        </ul>
    </div>

    <div id="tab-one" class="tab-content active">
        <div class="single-tabs">
            <?php if(get_static_option('donation_descriptions_show_hide')): ?>
            <div id="main-data">
                <?php echo Str::words(purify_html_raw($donation->cause_content),70); ?>

            </div>
            <div class="btn-wrapper">
                <a id="ReadMoreButton" class="text-primary" href=""><?php echo e(__('Read More')); ?></a>
            </div>
             <?php endif; ?>
        </div>
    </div>

    <div id="tab-two" class="tab-content">
        <div class="single-tabs">

    <?php if(get_static_option('donation_faq_show_hide')): ?>
            <?php
                $faq_items = !empty($donation->faq) ? unserialize($donation->faq,['class' => false]) : ['title' => []];
                 $rand_number = rand(9999,99999999);
            ?>
            <?php if(!empty(current($faq_items['title'])) ): ?>
                <div class="accordion-wrapper">
                    <h2 class="title"><?php echo e(get_static_option('donation_single_faq_title')); ?></h2>
                    <div id="accordion_<?php echo e($rand_number); ?>">
                        <?php $__currentLoopData = $faq_items['title']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $aria_expanded = 'false';
                            ?>
                            <div class="card" itemscope itemprop="mainEntity"
                                 itemtype="https://schema.org/Question">
                                <div class="card-header" id="headingOne_<?php echo e($loop->index); ?>"
                                     itemprop="name">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse"
                                           data-target="#collapseOne_<?php echo e($loop->index); ?>" role="button"
                                           aria-expanded="<?php echo e($aria_expanded); ?>"
                                           aria-controls="collapseOne_<?php echo e($loop->index); ?>">
                                            <?php echo e(purify_html($faq)); ?>

                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne_<?php echo e($loop->index); ?>" class="collapse "
                                     aria-labelledby="headingOne_<?php echo e($loop->index); ?>"
                                     data-parent="#accordion_<?php echo e($rand_number); ?>" itemscope
                                     itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                    <div class="card-body" itemprop="text">
                                        <?php echo e(purify_html($faq_items['description'][$loop->index] ?? '')); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
        </div>
    </div>

    <?php if(get_static_option('donation_updates_show_hide')): ?>
    <div id="tab-three" class="tab-content">
        <div class="single-tabs">
            <?php if($donation->cause_update_id && $causeUpCount->count() > 0): ?>
                <div class="cause-update-section">
                    <h3 class="title"><?php echo e(__('Updates')); ?> (<?php echo e($causeUpCount->count()); ?>) </h3>
                    <div id="recent_update_about_cause" data-page="0"></div>
                </div>
                <hr>
            <?php else: ?>
                <p class="alert alert-warning"><?php echo e(__('No Update Found')); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div id="tab-four" class="tab-content">
        <div class="single-tabs">
        <?php if(get_static_option('donation_comments_show_hide')): ?>
            <div class="cause-comment-section">
                <h3><?php echo e(__('Comments')); ?> (<?php echo e($causeCommentCount->count()); ?>) </h3>
            </div>
            <div class="cause-comment-body">
                
                <div class="box donor-load-box">
                    <div class="panel panel-default">
                        <div class="panel-body" id="comment_content_div">
                            <?php echo e(csrf_field()); ?>

                            <div id="comment_data" data-page="0">
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="error-message"></div>
                <?php if(auth()->guard('web')->check()): ?>
                    <form action="<?php echo e(route('cause.comment.store')); ?>" method="post"
                          id="cause-comment-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="cause_id" id="cause_id"
                               value="<?php echo e($donation->id); ?>">
                        <input type="hidden" name="user_id" id="user_id"
                               value="<?php echo e(auth()->guard('web')->user()->id); ?>">
                        <input type="hidden" name="commented_by" id="commented_by"
                               value="<?php echo e(auth()->guard('web')->user()->name); ?>">
                        <div class="form-group">
                                                <textarea name="comment_content" class="form-control" rows="2"
                                                          placeholder="<?php echo e(__('Write Comments..')); ?>"
                                                          id="comment_content"></textarea>
                        </div>
                        <div class="btn-wrapper">
                            <button id="submitComment" type="submit"
                                    class="boxed-btn reverse-color btn-sm"><?php echo e(__('Comment')); ?></button>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if(!auth()->guard('web')->check()): ?>
                    <?php echo $__env->make('frontend.partials.ajax-user-login-markup',['title' => __('Login To Leave a Comment')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/frontend/partials/donation-single/tab-view.blade.php ENDPATH**/ ?>
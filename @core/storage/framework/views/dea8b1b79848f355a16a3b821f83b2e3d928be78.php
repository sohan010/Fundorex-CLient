<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Job Post')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Edit Job Post')); ?>

                           <a class="btn btn-info btn-sm pull-right mb-3" href="<?php echo e(route('admin.jobs.all')); ?>"><?php echo e(__('All Jobs ')); ?></a>
                        </h4>
                        <form action="<?php echo e(route('admin.jobs.update')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="job_id" value="<?php echo e($job_post->id); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" class="form-control"  id="title" name="title" value="<?php echo e($job_post->title); ?>" placeholder="<?php echo e(__('Title')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug"><?php echo e(__('Slug')); ?></label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="<?php echo e($job_post->slug); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                        <input type="text" name="meta_tags"  class="form-control" data-role="tagsinput" value="<?php echo e($job_post->meta_tags); ?>" id="meta_tags">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                        <textarea name="meta_description"  class="form-control" rows="5" id="meta_description"><?php echo e($job_post->meta_description); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="position"><?php echo e(__('Job Position')); ?></label>
                                        <input type="text" class="form-control"  id="position" name="position" value="<?php echo e($job_post->position); ?>" placeholder="<?php echo e(__('Position')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="company_name"><?php echo e(__('Company Name')); ?></label>
                                        <input type="text" class="form-control"  id="company_name" value="<?php echo e($job_post->company_name); ?>"  name="company_name" placeholder="<?php echo e(__('Company Name')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="category"><?php echo e(__('Category')); ?></label>
                                        <select name="category_id" class="form-control" id="category">
                                            <option value=""><?php echo e(__("Select Category")); ?></option>
                                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($job_post->category_id == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="vacancy"><?php echo e(__('Vacancy')); ?></label>
                                        <input type="number" class="form-control"  id="vacancy" value="<?php echo e($job_post->vacancy); ?>" name="vacancy" placeholder="<?php echo e(__('Vacancy')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="job_context"><?php echo e(__('Job Context')); ?></label>
                                        <input type="hidden" name="job_context" value='<?php echo e($job_post->job_context); ?>'>
                                        <div class="summernote" data-content='<?php echo e($job_post->job_context); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="job_responsibility"><?php echo e(__('Job Responsibility')); ?></label>
                                        <input type="hidden" name="job_responsibility" value='<?php echo e($job_post->job_responsibility); ?>'>
                                        <div class="summernote" data-content='<?php echo e($job_post->job_responsibility); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="education_requirement"><?php echo e(__('Educational Requirements')); ?></label>
                                        <input type="hidden" name="education_requirement" value='<?php echo e($job_post->education_requirement); ?>'>
                                        <div class="summernote" data-content='<?php echo e($job_post->education_requirement); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="experience_requirement"><?php echo e(__('Experience Requirements')); ?></label>
                                        <input type="hidden" name="experience_requirement" value='<?php echo e($job_post->experience_requirement); ?>'>
                                        <div class="summernote" data-content='<?php echo e($job_post->experience_requirement); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="additional_requirement"><?php echo e(__('Additional Requirements')); ?></label>
                                        <input type="hidden" name="additional_requirement" value='<?php echo e($job_post->additional_requirement); ?>'>
                                        <div class="summernote" data-content='<?php echo e($job_post->additional_requirement); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="employment_status"><?php echo e(__('Employment Status')); ?></label>
                                        <select name="employment_status" id="employment_status"  class="form-control">
                                            <option <?php if($job_post->employment_status == 'full_time'): ?> selected <?php endif; ?> value="full_time"><?php echo e(__('Full-Time')); ?></option>
                                            <option <?php if($job_post->employment_status == 'part_time'): ?> selected <?php endif; ?> value="part_time"><?php echo e(__('Part-Time')); ?></option>
                                            <option <?php if($job_post->employment_status == 'project_based'): ?> selected <?php endif; ?> value="project_based"><?php echo e(__('Project Based')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="job_location"><?php echo e(__('Job Location')); ?></label>
                                        <input type="text" class="form-control"  id="job_location" name="job_location" value="<?php echo e($job_post->job_location); ?>" placeholder="<?php echo e(__('Job Location')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="other_benefits"><?php echo e(__('Compensation & Other Benefits')); ?></label>
                                        <input type="hidden" name="other_benefits" value='<?php echo e($job_post->other_benefits); ?>'>
                                        <div class="summernote" data-content='<?php echo e($job_post->other_benefits); ?>'></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary"><?php echo e(__('Salary')); ?></label>
                                        <input type="text" class="form-control"  id="salary" name="salary" value="<?php echo e($job_post->salary); ?>" placeholder="<?php echo e(__('Salary')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="deadline"><?php echo e(__('Deadline')); ?></label>
                                        <input type="date" class="form-control"  id="deadline" value="<?php echo e($job_post->deadline); ?>" name="deadline" placeholder="<?php echo e(__('Deadline')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="application_fee_status"><strong><?php echo e(__('Enable Application Fee')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="application_fee_status"  <?php if(!empty($job_post->application_fee_status)): ?> checked <?php endif; ?>>
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="application_fee"><?php echo e(__('Application Fee')); ?></label>
                                        <input type="number" class="form-control" name="application_fee" value="<?php echo e($job_post->application_fee); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="status"><?php echo e(__('Status')); ?></label>
                                        <select name="status" id="status"  class="form-control">
                                            <option <?php if($job_post->status == 'publish'): ?> selected <?php endif; ?> value="publish"><?php echo e(__('Publish')); ?></option>
                                            <option <?php if($job_post->status == 'draft'): ?> selected <?php endif; ?> value="draft"><?php echo e(__('Draft')); ?></option>
                                        </select>
                                    </div>
                                    <button id="update" type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Job Post')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.update','data' => []]); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                $('.summernote').summernote({
                    height: 200,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function(contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });

                if($('.summernote').length > 0){
                    $('.summernote').each(function(index,value){
                        $(this).summernote('code', $(this).data('content'));
                    });
                }

                $(document).on('change','#language',function(e){
                    e.preventDefault();
                    var selectedLang = $(this).val();
                    $.ajax({
                        url: "<?php echo e(route('admin.jobs.category.by.lang')); ?>",
                        type: "POST",
                        data: {
                            _token : "<?php echo e(csrf_token()); ?>",
                            lang : selectedLang
                        },
                        success:function (data) {
                            $('#category').html('<option value=""><?php echo e(__('Select Category')); ?></option>');
                            $.each(data,function(index,value){
                                $('#category').append('<option value="'+value.id+'">'+value.title+'</option>')
                            });
                        }
                    });
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/backend/jobs/edit-job.blade.php ENDPATH**/ ?>
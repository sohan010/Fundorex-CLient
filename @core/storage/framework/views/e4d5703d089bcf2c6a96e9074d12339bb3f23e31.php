<a tabindex="0" class="btn btn-danger btn-xs mb-3 mr-1 swal_delete_button">
    <i class="ti-trash"></i>
</a>
<form method='post' action='<?php echo e($url); ?>' class="d-none">
<input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
<br>
<button type="submit" class="swal_form_submit_btn d-none"></button>
 </form>
<?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/components/delete-popover.blade.php ENDPATH**/ ?>
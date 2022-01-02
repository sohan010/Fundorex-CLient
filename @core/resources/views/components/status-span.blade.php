@if($status === 'draft')
    <span class="alert alert-primary" >{{__('Draft')}}</span>
@elseif($status === 'archive')
    <span class="alert alert-warning" >{{__('Archive')}}</span>
@elseif($status === 'banned')
    <span class="alert alert-danger" >{{__('Banned')}}</span>
@elseif($status === 'pending')
    <span class="alert alert-warning" >{{__('Pending')}}</span>
@elseif($status === 'complete')
    <span class="alert alert-success" >{{__('Complete')}}</span>
@elseif($status === 'close')
    <span class="alert alert-danger" >{{__('Close')}}</span>
@elseif($status === 'in_progress')
    <span class="alert alert-info" >{{__('In Progress')}}</span>
@elseif($status === 'publish')
    <span class="alert alert-success" >{{__('Publish')}}</span>
@elseif($status === 'approved')
    <span class="alert alert-success" >{{__('Approved')}}</span>
@elseif($status === 'confirm')
    <span class="alert alert-success" >{{__('Confirm')}}</span>
@elseif($status === 'yes')
    <span class="alert alert-success" >{{__('Yes')}}</span>
@elseif($status === 'no')
    <span class="alert alert-danger" >{{__('No')}}</span>
@elseif($status === 'cancel')
    <span class="alert alert-danger" >{{__('Cancel')}}</span>
@endif
<?php
    $site_color = get_static_option('site_color');
    $secondary_color = get_static_option('site_secondary_color');
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title><?php echo e(get_static_option('site_title')); ?> - <?php echo e(get_static_option('site_tag_line')); ?></title>
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }

        .billing-details {
            text-align: left;
            padding-left: 15px;
            margin-bottom: 50px;
        }

        .billing-details li {
            line-height: 30px;
        }
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }
        .logo-inner-wrapper {
            padding: 10px;
            background-color: <?php echo e($secondary_color); ?>;
            margin: 0 auto;
            width: 250px;
            height: 50px;
            line-height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-inner-wrapper img {
            max-width: 200px;
        }

        .logo-inner-wrapper a {
            display: flex;
        }
        .mail-container .logo-wrapper {
            padding: 20px 0 20px;
        }
        table {
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #111d5c;
            color: white;
        }
        footer {
            margin: 20px 0;
            font-size: 14px;
        }
        .message-wrap {
            text-align: left;
            font-size: 16px;
            line-height: 26px;
            margin-bottom: 40px;
        }

        .message-wrap p {
            margin: 0;
        }

        .content-wrapper {
            padding: 30px;
            background-color: #f2f2f2;
            border-top: 5px solid <?php echo e($site_color); ?>;
        }
        /* event message */
        .single-events-list-item img {
            max-width: 100%;
            width: 100%;
        }
        .single-events-list-item {
            background-color: #ececec;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
        }
        .single-events-list-item .thumb {
            position: relative;
        }

        .single-events-list-item .thumb .time-wrap {
            position: absolute;
            left: 10px;
            bottom: 15px;
            background-color: <?php echo e($site_color); ?>;
            width: 60px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .single-events-list-item .thumb .time-wrap span {
            display: block;
            font-size: 20px;
            line-height: 25px;
            font-weight: 700;
            color: #fff;
        }
        .single-events-list-item .content-area {
            text-align: left;
        }

        .single-events-list-item .content-area .title {
            font-size: 24px;
            line-height: 30px;
            font-weight: 600;
            text-decoration: none;
            color: #333;
            margin-bottom: 20px;
        }

        .single-events-list-item .content-area a {
            text-decoration: none;
        }
        .single-events-list-item .content-area .location,.single-events-list-item .content-area p {
            color: #656565;
        }

        .single-events-list-item .content-area .location strong {
            color: #333;
        }
        .logo-wrapper img{
            max-width: 200px;
        }
    </style>
</head>
<body>
<div class="mail-container">
    <div class="logo-wrapper">
        <div class="logo-inner-wrapper">
            <a href="<?php echo e(url('/')); ?>">
                <?php echo render_image_markup_by_attachment_id(get_static_option('site_white_logo')); ?>

            </a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="message-wrap">
            <span class="hello"><?php echo e(__('Hello')); ?>,</span>
            <p class="message"><?php echo e($message_body); ?></p>
        </div>
        <div class="bottom-wrap">
            <div class="billing-wrap">
                <ul class="billing-details">
                    <li><strong><?php echo e(__('Attendance ID')); ?>:</strong> #<?php echo e($data->id); ?></li>
                    <li><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($payment->name); ?></li>
                    <li><strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($payment->email); ?></li>
                    <li><strong><?php echo e(__('Payment Method')); ?>:</strong>  <?php echo e(str_replace('_',' ',$payment->package_gateway)); ?></li>
                    <li><strong><?php echo e(__('Payment Status')); ?>:</strong> <?php echo e($payment->status); ?></li>
                    <li><strong><?php echo e(__('Transaction id')); ?>:</strong> <?php echo e($payment->transaction_id); ?></li>
                </ul>
            </div>
            <div class="events-wrap">
                <div class="single-events-list-item event-order-success-page">
                    <div class="thumb">
                        <?php echo render_image_markup_by_attachment_id($event->image,'','grid'); ?>

                        <div class="time-wrap">
                            <span class="date"><?php echo e(date('d',strtotime($event->date))); ?></span>
                            <span class="month"><?php echo e(date('M',strtotime($event->date))); ?></span>
                        </div>
                    </div>
                    <div class="content-area">
                        <div class="top-part">
                            <a href="<?php echo e(route('frontend.events.single',$event->slug)); ?>"><h4 class="title"><?php echo e($event->title); ?></h4></a>
                            <span class="location"> <strong><?php echo e(__('Location')); ?> :</strong> <?php echo e($event->venue_location); ?></span>
                        </div>
                        <p><?php echo e(strip_tags(Str::words(str_replace('&nbsp;',' ',$event->content),20))); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php echo get_footer_copyright_text(); ?>

    </footer>
</div>
</body>
</html>
<?php /**PATH /Users/sharifur/Desktop/sharifur-backup/localhost/fundorex/@core/resources/views/mail/event-attendance.blade.php ENDPATH**/ ?>
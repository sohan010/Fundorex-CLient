<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('Payment Success For ').get_static_option('site_title')}}</title>
    <style>
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }

        .mail-container .logo-wrapper {
            background-color: #111d5c;
            padding: 20px 0 20px;
        }
        table {
            margin: 0 auto;
        }
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
        .logo-wrapper img{
            max-width: 200px;
        }
    </style>
</head>
<body>
<div class="mail-container">
    <div class="logo-wrapper">
        <a href="{{url('/')}}">
            {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
        </a>
    </div>
    <p>{{__('Hi '.$data->name)}}</p>
    <p>{{__('You payment success for '. get_static_option('site_title'))}}</p>
    <table>
        <tr>
            <td>{{__('Attendance ID')}}</td>
            <td>{{$data->attendance_id}}</td>
        </tr>
        <tr>
            <td>{{__('Event Name')}}</td>
            <td>{{$data->event_name}}</td>
        </tr>
        <tr>
            <td>{{__('Event Cost')}}</td>
            <td>{{site_currency_symbol()}}{{$data->event_cost}}</td>
        </tr>
        <tr>
            <td>{{__('Quantity')}}</td>
            <td>{{$data->attendance_logs->quantity}}</td>
        </tr>
        <tr>
            <td>{{__('Payment Gateway')}}</td>
            <td>{{ucfirst(str_replace('_',' ',$data->package_gateway))}}</td>
        </tr>
        <tr>
            <td>{{__('Payment Status')}}</td>
            <td>{{$data->status}}</td>
        </tr>
        <tr>
            <td>{{__('Transaction ID')}}</td>
            <td>{{$data->transaction_id}}</td>
        </tr>
    </table>
    <footer>
        &copy; All Right Reserved By {{get_static_option('site_title')}}
    </footer>
</div>
</body>
</html>

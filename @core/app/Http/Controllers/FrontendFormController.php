<?php

namespace App\Http\Controllers;

use App\EventAttendance;
use App\Events;
use App\Feedback;
use App\JobApplicant;
use App\Jobs;
use App\Mail\BasicMail;
use App\Mail\ContactMessage;
use App\Mail\FeedbackMessage;
use App\Mail\PlaceOrder;
use App\Mail\RequestQuote;
use App\Newsletter;
use App\Order;
use App\PricePlan;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use function GuzzleHttp\Promise\all;

class FrontendFormController extends Controller
{


    public function send_contact_message(Request $request)
    {
        $validated_data = $this->get_filtered_data_from_request(get_static_option('contact_page_contact_form_fields'), $request);
        $all_attachment = $validated_data['all_attachment'];
        $all_field_serialize_data = $validated_data['field_data'];
        $succ_msg = get_static_option('contact_mail_' . get_user_lang() . '_success_message');
        $success_message = !empty($succ_msg) ? $succ_msg : __('Thanks for your contact!!');
        $contact_form_mail = get_static_option('contact_page_form_receiving_mail') ?? get_static_option('site_global_email');
        
        $google_captcha_result = google_captcha_check($request->captcha_token);
        if ($google_captcha_result['success']) {
             try{
                 Mail::to($contact_form_mail)->send(new ContactMessage($all_field_serialize_data, $all_attachment, __('You Have Contact Message from') . ' ' . get_static_option('site_title')));
            }catch(\Exception $e){
                $data['type'] = 'danger';
                $data['status'] = '400';
                $data['msg'] = $e->getMessage();
                return response()->json($data);
            }
        }else{
            $data['type'] = 'danger';
            $data['status'] = '400';
            $data['msg'] = __('google recaptcah error, try after sometime!!');
            return response()->json($data);
        }
        return response()->json(['msg' => $success_message,'type' => 'success']);
    }


    public function store_event_booking_data(Request $request){

        $validated_data = $this->get_filtered_data_from_request(get_static_option('event_attendance_form_fields'),$request);
        $all_attachment = $validated_data['all_attachment'];
        $all_field_serialize_data = $validated_data['field_data'];

        $event_detials = Events::find($request->event_id);
        $event_attendance_id = EventAttendance::create([
            'custom_fields' => serialize($all_field_serialize_data),
            'status' => 'pending',
            'event_name' => $event_detials->title,
            'event_cost' => $event_detials->cost,
            'quantity' => $request->quantity,
            'event_id' => $request->event_id,
            'checkout_type' => !empty($request->checkout_type) ? $request->checkout_type : '',
            'user_id' => Auth::guard('web')->check() ? Auth::guard('web')->user()->id : 0,
            'attachment' => serialize($all_attachment)
        ])->id;

        if (env('APP_ENV') == 'local'){
            //have to set condition for redirect in payment page with payment information
            if (!empty(get_static_option('site_payment_gateway'))) {

                $succ_msg = get_static_option('event_attendance_mail_subject');
                $success_message = !empty($succ_msg) ? $succ_msg : __('Thanks for your Booking. we will get back to you very soon.');
                $order_mail = get_static_option('event_attendance_receiver_mail') ? get_static_option('event_attendance_receiver_mail') : get_static_option('site_global_email');

                if ($event_detials->cost == 0 || empty(get_static_option('site_payment_gateway'))){
                    Mail::to($order_mail)->send(new ContactMessage($all_field_serialize_data, $all_attachment, __('Your have an event booking for').' '.$event_detials->title));
                    return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
                }

                return redirect()->route('frontend.event.booking.confirm', $event_attendance_id);

            }

            $success_message = __('Thanks for your Booking. we will get back to you very soon.');
            return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
        }


        $google_captcha_result = google_captcha_check($request->captcha_token);
        if ($google_captcha_result['success']) {

            //have to set condition for redirect in payment page with payment information
            if (!empty(get_static_option('site_payment_gateway'))) {

                $succ_msg = get_static_option('event_attendance_mail_' . get_user_lang() . '_subject');
                $success_message = !empty($succ_msg) ? $succ_msg : __('Thanks for your Booking. we will get back to you very soon.');
                $order_mail = get_static_option('event_attendance_receiver_mail') ? get_static_option('event_attendance_receiver_mail') : get_static_option('site_global_email');

                if ($event_detials->cost == 0 || empty(get_static_option('site_payment_gateway'))){

                  try{
                        Mail::to($order_mail)->send(new ContactMessage($all_field_serialize_data, $all_attachment, __('Your have an event booking for').' '.$event_detials->title));
                  }catch(\Eception $e){
                    return  redirect()->back()->with([
                        'type' => 'danger',
                        'msg' => $e->getMessage()
                    ]);
                  }

                    return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
                }
                return redirect()->route('frontend.event.booking.confirm', $event_attendance_id);

            }
            $success_message = __('Thanks for your Booking. we will get back to you very soon.');
            return redirect()->back()->with(['msg' => $success_message, 'type' => 'success']);
        }else{
             return redirect()->back()->with(['msg' => __('google reacpatch error, please try after some time!!'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Something goes wrong, Please try again later !!'), 'type' => 'danger']);
    }



    public function get_filtered_data_from_request($option_value,$request){

        $all_attachment = [];
        $all_quote_form_fields = (array) json_decode($option_value);
        $all_field_type = isset($all_quote_form_fields['field_type']) ? (array) $all_quote_form_fields['field_type'] : [];
        $all_field_name = isset($all_quote_form_fields['field_name']) ? $all_quote_form_fields['field_name'] : [];
        $all_field_required = isset($all_quote_form_fields['field_required'])  ? (object) $all_quote_form_fields['field_required'] : [];
        $all_field_mimes_type = isset($all_quote_form_fields['mimes_type']) ? (object) $all_quote_form_fields['mimes_type'] : [];

        //get field details from, form request
        $all_field_serialize_data = $request->all();
        unset($all_field_serialize_data['_token']);
        if (isset($all_field_serialize_data['captcha_token'])){
            unset($all_field_serialize_data['captcha_token']);
        }


        if (!empty($all_field_name)){
            foreach ($all_field_name as $index => $field){
                $is_required = !empty($all_field_required) && property_exists($all_field_required,$index) ? $all_field_required->$index : '';
                $mime_type = !empty($all_field_mimes_type) && property_exists($all_field_mimes_type,$index) ? $all_field_mimes_type->$index : '';
                $field_type = isset($all_field_type[$index]) ? $all_field_type[$index] : '';
                if (!empty($field_type) && $field_type == 'file'){
                    unset($all_field_serialize_data[$field]);
                }
                $validation_rules = !empty($is_required) ? 'required|': '';
                $validation_rules .= !empty($mime_type) ? $mime_type : '';

                //validate field
                $this->validate($request,[
                    $field => $validation_rules
                ]);

                if ($field_type == 'file' && $request->hasFile($field)) {
                    $filed_instance = $request->file($field);
                    $file_extenstion = $filed_instance->getClientOriginalExtension();
                    $attachment_name = 'attachment-'.Str::random(32).'-'. $field .'.'. $file_extenstion;
                    $filed_instance->move('assets/uploads/attachment/applicant', $attachment_name);
                    $all_attachment[$field] = 'assets/uploads/attachment/applicant/' . $attachment_name;
                }
            }
        }
        return [
            'all_attachment' => $all_attachment,
            'field_data' => $all_field_serialize_data
        ];
    }
}

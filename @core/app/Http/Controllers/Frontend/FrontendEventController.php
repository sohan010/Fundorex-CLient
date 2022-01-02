<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Events;
use App\EventsCategory;
use App\EventAttendance;
use App\EventPaymentLogs;
use Barryvdh\DomPDF\Facade as PDF;

class FrontendEventController extends Controller
{
    private const BASE_PATH = 'frontend.events.';

    //events
    public function events()
    {
        $all_events = Events::where(['status' => 'publish'])->orderBy('id', 'desc')->paginate(get_static_option('site_events_post_items'));
        $all_event_category = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'event')->with([
            'all_events' => $all_events,
            'all_event_category' => $all_event_category,
        ]);
    }

    public function events_category($id, $any)
    {
        $all_events = Events::where(['status' => 'publish', 'category_id' => $id])->orderBy('id', 'desc')->paginate(get_static_option('site_events_post_items'));
        $all_events_category = EventsCategory::where(['status' => 'publish'])->get();
        $category_name = EventsCategory::FindOrFail($id)->title;

        return view(self::BASE_PATH.'event-category')->with([
            'all_events' => $all_events,
            'all_events_category' => $all_events_category,
            'category_name' => $category_name,
        ]);
    }

    public function events_search(Request $request)
    {
        $all_events = Events::where(['status' => 'publish'])->where('title', 'LIKE', '%' . $request->search . '%')->paginate(get_static_option('site_events_post_items'));
        $all_events_category = EventsCategory::where(['status' => 'publish'])->get();
        $search_term = $request->search ?? '';

        return view(self::BASE_PATH.'event-search')->with([
            'all_events' => $all_events,
            'all_event_category' => $all_events_category,
            'search_term' => $search_term,
        ]);
    }

    public function events_single($slug)
    {

        $event = Events::where('slug', $slug)->first();
        if (empty($event)) {
            return redirect_404_page();
        }
        $all_events_category = EventsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'event-single')->with([
            'event' => $event,
            'all_event_category' => $all_events_category
        ]);
    }

    public function booking_confirm($id)
    {
        $attendance_details = EventAttendance::find($id);
        return view(self::BASE_PATH.'payment.booking-confirm')->with(['attendance_details' => $attendance_details]);
    }

    public function event_booking($id)
    {
        $event = Events::find($id);

        if(empty($event) || $event->date <= date('Y-m-d') ){
            return view('errors.403')->with(['message' => __('Event Expired')]);
        }
        return view(self::BASE_PATH.'event-booking')->with([
            'event' => $event
        ]);
    }


    public function event_payment_success($id)
    {
        $extract_id = substr($id,6);
        $extract_id =  substr($extract_id,0,-6);
        $attendance_details = EventAttendance::find($extract_id);
        if (empty($attendance_details)){
            return view('frontend.pages.404');
        }
        $payment_log = EventPaymentLogs::where('attendance_id', $attendance_details->id)->first();
        $event_details = Events::find($attendance_details->event_id);

        return view(self::BASE_PATH.'attendance-success')->with([
            'attendance_details' => $attendance_details,
            'payment_log' => $payment_log,
            'event_details' => $event_details,
        ]);
    }

    public function event_payment_cancel($id)
    {
        $attendance_details = EventAttendance::find($id);
        return view(self::BASE_PATH.'attendance-cancel')->with(['attendance_details' => $attendance_details]);
    }

    public function generate_event_invoice(Request $request)
    {
        $attendance_details = EventAttendance::find($request->id);
        if (empty($attendance_details)) {
            return redirect_404_page();
        }
        $payment_log = EventPaymentLogs::where(['attendance_id' => $request->id])->first();
        $pdf = PDF::loadView(self::BASE_PATH.'invoice.event-attendance', ['attendance_details' => $attendance_details, 'payment_log' => $payment_log]);
        return $pdf->download('event-attendance-invoice.pdf');
    }



}

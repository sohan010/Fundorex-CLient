<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\EventsCategory;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class EventsPageManageController extends Controller
{
    private const BASE_PATH = 'backend.events.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:page-settings-event-page-manage');
    }

    public function events_page_manage()
    {
        return view(self::BASE_PATH . 'page-manage');
    }

    public function update_events_page_manage(Request $request)
    {

        $this->validate($request, [
            'event_page_bg_image' => 'nullable|string',
        ]);

        $fields = [
            'event_page_bg_image',
        ];
        foreach ($fields as $field) {
            update_static_option($field, $request->$field);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Updated ...'),
            'type' => 'success'
        ]);
    }



}

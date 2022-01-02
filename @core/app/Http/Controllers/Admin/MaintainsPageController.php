<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FlashMsg;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaintainsPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:page-settings-maintain-page-manage');
    }

    public function maintains_page_settings()
    {
        return view('backend.pages.maintain-page.maintain-page-index');
    }

    public function update_maintains_page_settings(Request $request)
    {
        $this->validate($request, [
            'maintain_page_logo' => 'nullable|string|max:191',
            'maintain_page_background_image' => 'nullable|string|max:191',
             'maintain_page__title' => 'nullable|string',
             'maintain_page_description' => 'nullable|string'
        ]);


            $title =  'maintain_page_title';
            $description =  'maintain_page_description';

            update_static_option($title, $request->$title);
            update_static_option($description, $request->$description);

        if (!empty($request->maintain_page_logo)) {
            update_static_option('maintain_page_logo', $request->maintain_page_logo);
        }
        if (!empty($request->maintain_page_background_image)) {
            update_static_option('maintain_page_background_image', $request->maintain_page_background_image);
        }

        return redirect()->back()->with(FlashMsg::settings_update());
    }
}

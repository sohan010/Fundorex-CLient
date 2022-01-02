<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function form_builder()
    {
        return view('backend.pages.feedback.feedback-form-builder');
    }

    public function update_form_builder(Request $request)
    {
        $this->validate($request, [
            'field_name' => 'required|max:191',
            'field_placeholder' => 'required|max:191',
        ]);
        unset($request['_token']);
        $all_fields_name = [];
        $all_request_except_token = $request->all();
        foreach ($request->field_name as $fname) {
            array_push($all_fields_name, strtolower(Str::slug($fname)));
        }
        $all_request_except_token['field_name'] = $all_fields_name;
        $json_encoded_data = json_encode($all_request_except_token);

        update_static_option('feedback_page_form_fields', $json_encoded_data);
        return redirect()->back()->with(['msg' => __('Form Updated...'), 'type' => 'success']);
    }

    public function page_settings()
    {
        return view('backend.pages.feedback.feedback-page-settings');
    }

    public function update_page_settings(Request $request)
    {
        $this->validate($request,[
            'feedback_notify_mail' => 'required|email|max:191'
        ]);
        update_static_option('feedback_notify_mail',$request->feedback_notify_mail);

            $this->validate($request,[
                'feedback_page_form_name_label' => 'nullable|string',
                'feedback_page_form_email_label' => 'nullable|string',
                'feedback_page_form_ratings_label' => 'nullable|string',
                'feedback_page_form_description_label' => 'nullable|string',
                'feedback_page_form_form_title' => 'nullable|string',
                'feedback_page_form_button_text' => 'nullable|string',
            ]);
            $all_field = [
                'feedback_page_form_name_label',
                'feedback_page_form_email_label',
                'feedback_page_form_ratings_label',
                'feedback_page_form_description_label',
                'feedback_page_form_button_text',
                'feedback_page_form_form_title'
            ];
            foreach ($all_field as $field){
                update_static_option($field,$request->$field);
            }

        return redirect()->back()->with([
            'msg' => __('Settings Updated....'),
            'type' => 'success'
        ]);
    }

    public function all_feedback(){
        $all_feedback = Feedback::all();
        return view('backend.pages.feedback.feedback-all')->with(['all_feedback' => $all_feedback]);
    }

    public function delete_feedback(Request $request,$id){
        Feedback::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Feedback Delete Success....'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        $all = Feedback::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\DataTableHelpers\General;
use App\Helpers\FlashMsg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\JobApplicant;
use App\Jobs;
use App\JobsCategory;
use App\Language;
use App\Mail\BasicMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class JobsController extends Controller
{
    private const BASE_PATH = 'backend.jobs.';
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:job-list|job-create|job-edit|job-delete',['only' => ['all_jobs']]);
        $this->middleware('permission:job-create',['only' => ['new_job','store_job']]);
        $this->middleware('permission:job-edit',['only' => ['edit_job','update_job','clone_job']]);
        $this->middleware('permission:job-delete',['only' => ['delete_job','bulk_action']]);
        /* job applicant permission */
        $this->middleware('permission:job-applicant-list|job-applicant-view|job-applicant-delete|job-applicant-mail',['only' => ['all_jobs_applicant']]);
        $this->middleware('permission:job-applicant-view',['only' => ['job_applicant_view']]);
        $this->middleware('permission:job-applicant-delete',['only' => ['delete_job_applicant','job_applicant_bulk_delete']]);
        $this->middleware('permission:job-applicant-mail',['only' => ['job_applicant_mail']]);
        /* job applicant report */
        $this->middleware('permission:job-applicant-report',['only' => ['job_applicant_report']]);
        $this->middleware('permission:job-settings',['only' => ['settings','update_settings']]);

    }

    public function all_jobs(){
        $all_jobs = Jobs::latest()->get();
        return view(self::BASE_PATH.'all-jobs')->with(['all_jobs' => $all_jobs]);
    }
    

    public function new_job(){
        $all_category = JobsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'new-job')->with(['all_category' => $all_category]);
    }

    public function store_job(Request $request){
        $this->validate($request,[
            'title' => 'required|string',
            'position' => 'required|string|max:191',
            'company_name' => 'required|string|max:191',
            'category_id' => 'required|string|max:191',
            'vacancy' => 'required|string|max:191',
            'job_responsibility' => 'required|string',
            'employment_status' => 'required|string',
            'education_requirement' => 'nullable|string',
            'job_context' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'job_location' => 'required|string',
            'salary' => 'required|string',
            'other_benefits' => 'nullable|string',
            'email' => 'nullable|string|max:191',
            'status' => 'nullable|string|max:191',
            'deadline' => 'required|string|max:191',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
            'slug' => 'nullable|string|max:191',
        ]);

        Jobs::create([
            'title' => $request->title,
            'position' => $request->position,
            'company_name' => $request->company_name,
            'category_id' => $request->category_id,
            'vacancy' => $request->vacancy,
            'job_responsibility' => $request->job_responsibility,
            'employment_status' => $request->employment_status,
            'education_requirement' => $request->education_requirement,
            'job_context' => $request->job_context,
            'experience_requirement' => $request->experience_requirement,
            'additional_requirement' => $request->additional_requirement,
            'job_location' => $request->job_location,
            'salary' => $request->salary,
            'other_benefits' => $request->other_benefits,
            'email' => $request->email,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'application_fee' => $request->application_fee,
            'application_fee_status' => $request->application_fee_status,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title) ,
        ]);

        return redirect()->back()->with(['msg' => __('New Job Post Added'),'type' => 'success']);
    }

    public function edit_job($id){

        $job_post = Jobs::find($id);
        $all_category = JobsCategory::where(['status' => 'publish'])->get();
        $all_language =  Language::orderBy('default','desc')->get();;

        return view(self::BASE_PATH.'edit-job')->with([
            'all_languages' => $all_language,
            'all_category' => $all_category,
            'job_post' => $job_post
        ]);
    }

    public function update_job(Request $request){
        $request->validate([
            'title' => 'required|string',
            'position' => 'required|string|max:191',
            'company_name' => 'required|string|max:191',
            'category_id' => 'required|string|max:191',
            'vacancy' => 'required|string|max:191',
            'job_responsibility' => 'required|string',
            'employment_status' => 'required|string',
            'education_requirement' => 'nullable|string',
            'experience_requirement' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'job_context' => 'nullable|string',
            'job_location' => 'required|string',
            'salary' => 'required|string',
            'other_benefits' => 'nullable|string',
            'email' => 'nullable|string|max:191',
            'status' => 'nullable|string|max:191',
            'deadline' => 'required|string|max:191',
            'meta_tags' => 'nullable|string|max:191',
            'meta_description' => 'nullable|string|max:191',
            'slug' => 'nullable|string|max:191',
        ]);

        Jobs::find($request->job_id)->update([
            'title' => $request->title,
            'position' => $request->position,
            'company_name' => $request->company_name,
            'category_id' => $request->category_id,
            'vacancy' => $request->vacancy,
            'job_responsibility' => $request->job_responsibility,
            'employment_status' => $request->employment_status,
            'education_requirement' => $request->education_requirement,
            'job_context' => $request->job_context,
            'experience_requirement' => $request->experience_requirement,
            'additional_requirement' => $request->additional_requirement,
            'job_location' => $request->job_location,
            'salary' => $request->salary,
            'other_benefits' => $request->other_benefits,
            'email' => $request->email,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title) ,
            'application_fee' => $request->application_fee,
            'application_fee_status' => $request->application_fee_status,
        ]);

        return redirect()->back()->with(['msg' => __('Job Post Update Success...'),'type' => 'success']);
    }
    public function clone_job(Request $request){
        $job_post = Jobs::find($request->item_id);
        Jobs::create([
            'title' => $job_post->title,
            'position' => $job_post->position,
            'company_name' => $job_post->company_name,
            'category_id' => $job_post->category_id,
            'vacancy' => $job_post->vacancy,
            'job_responsibility' => $job_post->job_responsibility,
            'employment_status' => $job_post->employment_status,
            'education_requirement' => $job_post->education_requirement,
            'job_context' => $job_post->job_context,
            'experience_requirement' => $job_post->experience_requirement,
            'additional_requirement' => $job_post->additional_requirement,
            'job_location' => $job_post->job_location,
            'salary' => $job_post->salary,
            'other_benefits' => $job_post->other_benefits,
            'email' => $job_post->email,
            'status' => 'draft',
            'deadline' => $job_post->deadline,
            'meta_tags' => $job_post->meta_tags,
            'meta_description' => $job_post->meta_description,
            'application_fee' => $job_post->application_fee,
            'application_fee_status' => $job_post->application_fee_status,
            'slug' => !empty($request->slug) ? \Str::slug($request->slug) : \Str::slug($request->title) ,

        ]);
        return redirect()->back()->with(['msg' => __('Job Post Clone Success...'),'type' => 'success']);
    }
    public function delete_job(Request $request,$id){
        Jobs::find($id)->delete();

        return redirect()->back()->with(['msg' => __('Job Post Deleted Success'),'type' => 'danger']);
    }

    public function all_jobs_applicant(Request $request){

        if ($request->ajax()){
            $payment_logs = JobApplicant::orderBy('id','desc')->get();
            return DataTables::of($payment_logs)
                ->addIndexColumn()
                ->addColumn('checkbox',function ($row){
                    return General::bulkCheckbox($row->id);
                })
                ->addColumn('job_title',function ($row){
                    return optional($row->job)->title;
                })
                ->addColumn('job_position',function ($row){
                    return optional($row->job)->position;
                })
                ->addColumn('date',function ($row){
                    return date_format($row->created_at,'d M Y');
                })
                ->addColumn('action', function($row){
                    $action = '';
                    $admin = auth()->guard('admin')->user();
                    if ($admin->can('job-applicant-delete')){
                        $action .= General::deletePopover(route('admin.jobs.applicant.delete',$row->id));
                    }
                    if ($admin->can('job-applicant-view')){
                        $action .= General::viewIcon(route('admin.jobs.applicant.view',$row->id));
                    }
                    if ($admin->can('job-applicant-mail')){
                        $action .= '<a href="#" data-toggle="modal" data-target="#send_mail_modal" data-id="'.$row->id.'" = data-name="'.$row->name.'" data-email="'.$row->email.'" class="btn btn-lg btn-secondary btn-sm mb-3 mr-1 send_mail_btn" >  <i class="ti-email"></i> </a>';
                    }
                    return $action;
                })
                ->rawColumns(['action','checkbox'])
                ->make(true);
        }
        return view(self::BASE_PATH.'all-applicant');
    }

    public function delete_job_applicant(Request $request,$id){
        $job_details = JobApplicant::find($id);
        $all_attachment = unserialize($job_details->attachment);
        foreach($all_attachment as $name => $path){
            if(file_exists($path)){
                @unlink($path);
            }
        }
        JobApplicant::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Job Application Delete Success...'),'type' => 'danger']);
    }

    public function bulk_action(Request $request){
        $all = Jobs::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
    public function job_applicant_bulk_delete(Request $request){
        $all = JobApplicant::find($request->ids);
        foreach($all as $item){
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }

    public function job_applicant_report(Request  $request){
        $order_data = '';
        $jobs = Jobs::where(['status' => 'publish'])->get();
        $query = JobApplicant::query();
        if (!empty($request->start_date)){
            $query->whereDate('created_at','>=',$request->start_date);
        }
        if (!empty($request->end_date)){
            $query->whereDate('created_at','<=',$request->end_date);
        }
        if (!empty($request->job_id)){
            $query->where(['jobs_id' => $request->job_id ]);
        }
        $error_msg = __('select start & end date to generate applicant report');
        if (!empty($request->start_date) && !empty($request->end_date)){
            $query->orderBy('id','DESC');
            $order_data =  $query->paginate($request->items);
            $error_msg = '';
        }

        return view(self::BASE_PATH.'applicant-report')->with([
            'order_data' => $order_data,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'items' => $request->items,
            'job_id' => $request->job_id,
            'jobs' => $jobs,
            'error_msg' => $error_msg
        ]);
    }


    public function job_applicant_mail(Request $request){
        $request->validate([
           'applicant_id' => 'required',
           'name' => 'nullable',
           'email' => 'nullable',
           'subject' => 'required',
           'message' => 'required',
        ]);

        $applicant_details = JobApplicant::find($request->applicant_id);
        try{
         Mail::to($applicant_details->email)->send(new BasicMail([
            'subject' => $request->subject,
            'message' => $request->message
        ]));   
        }catch(\Exception $e){
             return redirect()->back()->with(['msg' => $e->getMessage(),'type' => 'danger']);
        }

        return redirect()->back()->with(['msg' => __('Mail Send Success'),'type' => 'success']);
    }

    public function settings(){
        return view(self::BASE_PATH.'job-settings');
    }

    public function update_settings(Request $request){

        $request->validate([
            'job_success_page_title'  => 'nullable|string',
            'job_success_page_description'  => 'nullable|string',
            'job_cancel_page_title'  => 'nullable|string',
            'job_cancel_page_description'  => 'nullable|string',
            'site_job_post_items'  => 'nullable|string',
            'job_single_page_job_responsibility_label'  => 'nullable|string',
            'job_single_page_education_requirement_label'  => 'nullable|string',
            'job_single_page_experience_requirement_label'  => 'nullable|string',
            'job_single_page_additional_requirement_label'  => 'nullable|string',
            'job_single_page_others_benefits_label'  => 'nullable|string',
            'job_single_page_apply_button_text'  => 'nullable|string',
            'job_single_page_job_info_text'  => 'nullable|string',
            'job_single_page_company_name_text'  => 'nullable|string',
            'job_single_page_job_category_text'  => 'nullable|string',
            'job_single_page_job_position_text'  => 'nullable|string',
            'job_single_page_job_type_text'  => 'nullable|string',
            'job_single_page_salary_text'  => 'nullable|string',
            'job_single_page_job_location_text'  => 'nullable|string',
            'job_single_page_job_deadline_text'  => 'nullable|string',
            'job_single_page_job_application_fee_text'  => 'nullable|string',
            'job_single_page_apply_form' => 'nullable|string|max:191',
            'job_single_page_applicant_mail' => 'required|string|max:191',
        ]);

        $all_fields = [
            'job_success_page_title',
            'job_success_page_description',
            'job_cancel_page_title',
            'job_cancel_page_description',
            'site_job_post_items',
            'job_single_page_job_context_label',
            'job_single_page_job_responsibility_label',
            'job_single_page_education_requirement_label',
            'job_single_page_experience_requirement_label',
            'job_single_page_additional_requirement_label',
            'job_single_page_others_benefits_label',
            'job_single_page_apply_button_text',
            'job_single_page_job_info_text',
            'job_single_page_company_name_text',
            'job_single_page_job_category_text',
            'job_single_page_job_position_text',
            'job_single_page_job_type_text',
            'job_single_page_salary_text',
            'job_single_page_job_location_text',
            'job_single_page_job_deadline_text',
            'job_single_page_job_application_fee_text',
            'job_single_page_apply_form',
            'job_single_page_applicant_mail',
        ];
        foreach ($all_fields as $field){
            update_static_option($field,$request->$field);
        }

        return redirect()->back()->with(FlashMsg::item_update());
    }

    public function job_applicant_view($id){
        $applicant = JobApplicant::findOrFail($id);
        return view(self::BASE_PATH.'applicant-view',compact('applicant'));
    }
}

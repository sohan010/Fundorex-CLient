<?php

namespace App\Http\Controllers\Frontend;
use App\JobApplicant;
use App\Jobs;
use App\JobsCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Events;
use App\EventsCategory;
use App\EventAttendance;
use App\EventPaymentLogs;

class FrontendJobController extends Controller
{
    public const BASE_PATH = 'frontend.jobs.';
    //jobs
    public function jobs()
    {
        $all_jobs = Jobs::where(['status' => 'publish'])->orderBy('id', 'desc')->paginate(get_static_option('site_job_post_items'));
        $all_job_category = JobsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'jobs')->with([
            'all_jobs' => $all_jobs,
            'all_job_category' => $all_job_category,
        ]);
    }

    public function jobs_category($id, $any)
    {
        $all_jobs = Jobs::where(['status' => 'publish', 'category_id' => $id])->orderBy('id', 'desc')->paginate(get_static_option('site_job_post_items'));

        $all_job_category = JobsCategory::where(['status' => 'publish'])->get();
        $category_name = JobsCategory::find($id)->title;
        return view(self::BASE_PATH.'jobs-category')->with([
            'all_jobs' => $all_jobs,
            'all_job_category' => $all_job_category,
            'category_name' => $category_name,
        ]);
    }

    public function jobs_search(Request $request)
    {
        $all_jobs = Jobs::where(['status' => 'publish'])->where('title', 'LIKE', '%' . $request->search . '%')->paginate(get_static_option('site_job_post_items'));
        $all_job_category = JobsCategory::where(['status' => 'publish'])->get();
        $search_term = $request->search;

        return view(self::BASE_PATH.'jobs-search')->with([
            'all_jobs' => $all_jobs,
            'all_job_category' => $all_job_category,
            'search_term' => $search_term,
        ]);
    }

    public function jobs_single($slug)
    {
        $job = Jobs::where('slug', $slug)->first();
        if (empty($job)) {
            return redirect_404_page();
        }
        $all_job_category = JobsCategory::where(['status' => 'publish'])->get();
        return view(self::BASE_PATH.'jobs-single')->with([
            'job' => $job,
            'all_job_category' => $all_job_category
        ]);
    }

    public function jobs_apply($id)
    {
        $job = Jobs::find($id);

        if ($job->deadline <= date('Y-m-d')){
            return view('errors.403')->with('message','job Expired');
        }
        return view(self::BASE_PATH.'jobs-apply')->with([
            'job' => $job
        ]);
    }

    public function job_payment_cancel($id){
        $applicant_details = JobApplicant::find($id);
        $job_details = Jobs::find($applicant_details->jobs_id);
        if (empty($applicant_details)){
            return redirect_404_page();
        }
        return view(self::BASE_PATH.'job-cancel')->with(['applicant_details' => $applicant_details,'job_details' => $job_details]);
    }

    public function job_payment_success($id){
        $extract_id = substr($id,6);
        $extract_id =  substr($extract_id,0,-6);
        $applicant_details = JobApplicant::find($extract_id);
        if (empty($applicant_details)){
            return redirect_404_page();
        }
        $job_details = Jobs::find($applicant_details->jobs_id);
        return view(self::BASE_PATH.'job-success')->with(['applicant_details' => $applicant_details,'job_details' => $job_details]);
    }

}

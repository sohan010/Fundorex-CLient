<?php

namespace App\Http\Middleware;

use App\Cause;
use App\Language;
use App\TopbarInfo;
use Closure;
use Illuminate\Http\Request;
use App\DonationWithdraw;

class AdminGlobalVariable
{

    public function handle(Request $request, Closure $next)
    {
       
        $pending_cases_count = Cause::where('status','pending')->count();
        $lang = !empty(session()->get('lang')) ? session()->get('lang') : Language::where('default',1)->first()->slug;
        $all_languages = Language::all();
        $home_page_variant_number = get_static_option('home_page_variant');
        $admin_languages = Language::where(['default'=>1,'status'=>'publish'])->first();
        $admin_default_lang = $admin_languages->slug;
        $pending_withdraw = DonationWithdraw::where('payment_status','pending')->count();
        $home_variant_number = get_static_option('home_page_variant');

        $data = [
            'lang' => $lang,
            'all_languages' => $all_languages,
            'pending_cases_count' => $pending_cases_count,
            'home_page_variant_number' => $home_page_variant_number,
            'admin_default_lang' => $admin_default_lang,
            'pending_withdraw_count' => $pending_withdraw,
            'home_variant_number' => $home_variant_number,
        ];

        view()->composer('*', function ($view) use ($data) {
            $view->with($data);
        });
      
        return $next($request);
    }
}

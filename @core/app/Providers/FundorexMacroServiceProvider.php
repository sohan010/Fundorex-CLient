<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Mews\Purifier\Purifier;

class FundorexMacroServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        Request::macro('sanitize_html',function($value){
            return htmlspecialchars(strip_tags(Request::get($value)));
        });

        Request::macro('custom_html',function($value){
            return Purifier::clean(Request::get($value));
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Catalogenr;
use App\Models\Country;
use App\Models\setting;
use App\Models\categories;
use App\Models\SubCategory;

use function GuzzleHttp\Promise\settle;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::first();
        view()->share('settings', $setting);
        $category = categories::all();
        view()->share('categories', $category);
        $Subcategory = SubCategory::all();
        view()->share('Subcategories', $Subcategory);
        $countries = Country::all();
        view()->share('countries', $countries);
        $catalogenr =  Catalogenr::all();
        view()->share('catalogenr', $catalogenr);
    }
}

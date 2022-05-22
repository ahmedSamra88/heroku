<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use App\Models\Project;
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
        //
        Schema::defaultStringLength(191);
        
        Paginator::useBootstrap();
        // Paginator::useBootstrapFour();
        // share varaibles
        view()->composer('*', function ($view) {

            $projectdesign=["سكني","تجاري","تجاري سكني"];
            $projectType=["فيلا سكنية","دور أرضي","فيلا دوبلكس","آخرى"];
            $services=["الرفع المساحي","التصميم المعماري","تقرير التربة","المخطات التنفيذية","تصميم مخططات التكييف","مخططات الامن والسلامة","رفع رخصة البناء","تصميم الواجهات الخارجية","التصميم الداخلي","جداول الكميات","الاشراف الهندسي اعمال العظم","الاشراف الهندسي اعمال التشطيبات","","","","","",""];
            $model=["مودرن","نيو مودرن","كلاسيك","ىخرى"];
            $views=["شمالية","شرقية","جنوبية","غربية"];
            $view->with(["projectdesign"=>$projectdesign,"projectType"=>$projectType,"services"=>$services,"designmodel"=>$model,"views"=>$views,"count_of_project"=>Project::where("state",0)->count()]);
        });

    }
}

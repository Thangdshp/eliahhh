<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravolt\Avatar\Avatar;
use Illuminate\Support\Facades\Auth;
use App\Helper\CartHelper;
use App\Models\Banner;
use Route;
use App\Models\ConfigPage;

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
        $configInfor=ConfigPage::where([
            ['status','=',1],
            ['name','=','Info']
        ])->orderBy('updated_at','DESC')->first();

        $configEffect=ConfigPage::where([
            ['status','=',1],
            ['name','<>','Info']
        ])->orderBy('updated_at','DESC')->first();

        view()->composer('*', function($view) use($configEffect,$configInfor){
            $view->with([
                'avatar' => 'storage/app/avatar.jpg',
                'cart'=> new CartHelper(),
                'bannerW'=> new Banner(),
                'configInfor'=> $configInfor,
                'configEffect'=>$configEffect
            ]);
        });
       
    }
}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\View; //追加


class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * ログインユーザーの未読通知をビューに渡す
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View::composer(
        //     // 'test','App\View\Composers\NotificationComposer'
        //     'test', function($view){
        //         $view->with('message','Laravelを学ぼう！' );
        //     }
      
        //   );
            
    }
}

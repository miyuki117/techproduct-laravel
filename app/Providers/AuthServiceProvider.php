<?php

namespace App\Providers;

use App\Models\Calendar;
use App\Models\Test;
use App\Policies\TestPolicy;
use App\Policies\CalendarPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションのポリシーマッピング
     *
     * @var array
     */
    protected $policies = [
        Test::class => TestPolicy::class,
        Calendar::class => CalendarPolicy::class,

    ];

    /**
     * 全アプリケーション認証／認可サービス登録
     */
    public function boot(): void
    {
        // ...
    }
}
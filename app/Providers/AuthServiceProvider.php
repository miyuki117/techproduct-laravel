<?php

namespace App\Providers;

use App\Models\Test;
use App\Policies\TestPolicy;
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
    ];

    /**
     * 全アプリケーション認証／認可サービス登録
     */
    public function boot(): void
    {
        // ...
    }
}
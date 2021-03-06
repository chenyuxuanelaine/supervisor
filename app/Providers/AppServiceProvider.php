<?php

namespace App\Providers;

use App\Http\Logic\OperationApi;
use App\Http\Logic\UserApi;
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
        //用户注册登陆
        $this->app->singleton('userApi', function() {
            return new UserApi();
        });

        //用户操作权限
        $this->app->singleton('operationApi', function() {
            return new OperationApi();
        });
    }
}

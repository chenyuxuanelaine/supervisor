<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


//登陆页面
$app->group(['namespace' => 'Home'], function () use ($app) {
    //登陆页面
    $app->get('home/user/loadlogin',['as'=>'loadlogin', 'uses'=>'UserController@login']);
//    登录
    $app->post('home/user/submitlogin',['as'=>'submitlogin', 'uses'=>'UserController@submitLogin']);
//    注册
    $app->post('home/user/register',['as'=>'register', 'uses'=>'UserController@register']);
//    验证手机
    $app->post('home/user/verrifyPhone',['as'=>'verrifyPhone', 'uses'=>'UserController@verrifyPhone']);
//    找回密码
    $app->post('home/user/resetPwd',['as'=>'resetPwd', 'uses'=>'UserController@resetPwd']);
});

//主页
$app->group(['namespace' => 'Home', 'middleware'=>'loginLimmit'], function () use ($app) {
    $app->get('/',['as'=>'index', 'uses'=>'IndexController@index']);
});
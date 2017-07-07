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


/***前台***/
$app->group(['namespace' => 'Home'], function () use ($app) {
    //登陆页面
    $app->get('home/user/loadlogin',['as'=>'loadlogin', 'uses'=>'UserController@login']);
    //登录
    $app->post('home/user/submitlogin',['as'=>'submitlogin', 'uses'=>'UserController@submitLogin']);
});

//主页
$app->group(['namespace' => 'Home', 'middleware'=>'HomeLogin'], function () use ($app) {
    $app->get('/',['as'=>'index', 'uses'=>'IndexController@index']);
});


/***后台***/
$app->group(['namespace' => 'Admin'], function () use ($app) {
    //登陆页面
    $app->get('admin/operation/loadlogin',['as'=>'Adminlogin', 'uses'=>'OperationController@login']);
    //登录
    $app->post('admin/operation/submitlogin',['as'=>'AdminSubmit', 'uses'=>'OperationController@submitLogin']);
});

$app->group(['namespace' => 'Admin', 'middleware'=>'AdminLogin'], function () use ($app) {
    $app->get('admin/operation/index',['as'=>'AdminIndex', 'uses'=>'OperationController@index']);
    $app->get('admin/operation/editUser',['as'=>'editUser', 'uses'=>'OperationController@editUser']);
    $app->get('admin/operation/addUserForm',['as'=>'addUserForm', 'uses'=>'OperationController@addUser']);
    $app->post('admin/operation/addUser',['as'=>'addUser', 'uses'=>'OperationController@addUser']);
    $app->get('admin/operation/getFile',['as'=>'getFile', 'uses'=>'OperationController@getFile']);
});
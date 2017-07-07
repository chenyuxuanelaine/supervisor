<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/7/5
 * Time: 15:30
 */

namespace App\Http\Controllers\Admin;

use App\Exceptions\ApiException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperationController extends Controller{
    public function login(){
        return view('Admin.login');
    }


    public function submitLogin(Request $request){
        try{
            $data = [];
            $data['user_name'] = trim($request->input('user_name', ''));
            $data['is_checked'] = trim($request->input('is_checked', ''));
            $data['password'] = trim($request->input('password', ''));
            $res = application()->operationApi->submitLogin($data);
            if(!empty($res)){
                return $this->response();
            }else{
                return $this->error(ApiException::LOGIN_FAIL, '用户名或密码错误');
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }

    public function index(Request $request){
        if (session_status() == PHP_SESSION_NONE) session_start();
        $user_info = empty($_SESSION['user_info'])?[]:$_SESSION['user_info'];
        $id = trim($request->input('id', ''));
        if(!empty($id)){
            application()->operationApi->deleteUser($id);
        }
        $list = application()->operationApi->getUserList();
        return view('Admin.AdminIndex', ['user_info'=>$user_info, 'list'=>$list]);
    }

    public function addUser(Request $request){
        $method = $request->method();
        if($method == 'GET'){
            return view('Admin.addUser');
        }
        if($method == 'POST'){
            $data = [];
            $data['user_name'] = trim($request->input('user_name', ''));
            $data['privilege'] = trim($request->input('privilege', ''));
            $data['password'] = trim($request->input('password', ''));
            $res = application()->operationApi->addUser($data);
        }
    }

    public function editUser(Request $request){
        $id = trim($request->input('id', ''));
        application()->operationApi->editUser($id);
    }

    public function getFile(Request $request){
        try{
            $file_name = trim($request->input('file_name', ''));
            $res = application()->operationApi->getFile($file_name);
            if(!empty($res)){
                return $this->response($res);
            }else{
                return $this->error(ApiException::FAIL,'最后一级目录');
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }

}




















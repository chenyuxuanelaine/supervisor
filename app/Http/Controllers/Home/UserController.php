<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/24
 * Time: 16:40
 */
namespace APP\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Exceptions\ApiException;
use Illuminate\Http\Request;

class UserController extends Controller{
    //登录页面
    public function login(){
        return view('Home.login');
    }
    //注册添加用户
    public function register(Request $request){
        try{
            $data = [];
            $data['user_name'] = trim($request->input('user_name', ''));
            $data['account'] = trim($request->input('account', ''));
            $data['password'] = trim($request->input('password', ''));
            $res = application()->userApi->register($data);
            if(!empty($res)){
                return $this->response();
            }else{
                return $this->error(ApiException::REGISTER_FAIL);
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }

    }

    //注册时验证手机号唯一性
    public function verrifyPhone(Request $request){
        try{
            $phone = trim($request->input('phone', ''));
            $res = application()->userApi->verifyPhone($phone);
            if(!empty($res)){
                return $this->response();
            }else{
                return $this->error(ApiException::ACCOUNT_EXISTS);
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }

    public function submitLogin(Request $request){
        try{
            $data = [];
            $data['user_name'] = trim($request->input('user_name', ''));
            $data['is_checked'] = trim($request->input('is_checked', ''));
            $data['password'] = trim($request->input('password', ''));
            $res = application()->userApi->submitLogin($data);
            if(is_array($res)){
                return $this->error(ApiException::LOGIN_FAIL, $res['msg']);
            }else{
                return $res;
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }

    public function resetPwd(Request $request){
        try{
            $data = [];
            $data['account'] = trim($request->input('account', ''));
            $data['password'] = trim($request->input('password', ''));
            $res = application()->userApi->resetPwd($data);
            if($res['code'] == 1000){
                return $this->response();
            }else{
                return $this->error($res['code']);
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }
}
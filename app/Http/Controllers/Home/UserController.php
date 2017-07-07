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

}
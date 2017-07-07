<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/27
 * Time: 10:45
 */

namespace App\Http\Logic;

use App\Exceptions\ApiException;
use App\Http\Model\UserModel;
use Galaxy\Framework\Log\Log;

class UserApi{
    //登录
    public function submitLogin($data){
        $res = UserModel::select('*')->where('user_name', $data['user_name'])->first();
        if(empty($res)){
            return [
                'code'=>ApiException::LOGIN_FAIL,
                'msg'=>'用户名或密码错误'
            ];
        }
        $res = $res->toArray();
        if($res['password'] != md5(md5($data['password']))){
            return [
                'code'=>ApiException::LOGIN_FAIL,
                'msg'=>'用户名或密码错误'
            ];
        }

        //更新用户登录时间
        UserModel::where('id', $res['id'])->update(['last_login_time'=>time()]);

        //登陆后将旧token删除，生成新token
        $token = application()->redis->get('user_token_'.$res['id']);
        if(!empty($token)){
            application()->redis->del('user_token_'.$res['id']);
            application()->redis->del('user_info_'.$token);
        }
        //token 生成
        $new_token = uniqid() . md5(mt_rand(100000000, 999999999));
        $user_info = [
            'id'=>$res['id'],
            'user_name'=>$res['user_name'],
            'last_login_time'=>$res['last_login_time'],
        ];
        $user_info = json_encode($user_info);
        application()->redis->setnx('user_token_'.$res['id'], $new_token);
        application()->redis->setnx('user_info_'.$new_token, $user_info);
//        $to = application()->redis->get('user_token_'.$res['id']);
//        $info = application()->redis->get('user_info_'.$new_token);
//        Log::getLogger()->info(0, 'cookie', [$to,$info]);
        if($data['is_checked'] == 1){
            //将token保存七天有效期,生成cookie
            $response = new \Illuminate\Http\Response();
            $response->withCookie(\Cookie::make('user_token', NULL, -86400));
            $response->withCookie(\Cookie::make('user_token', $new_token, 60 * 24 * 7));
            return $response;
//            \Cookie::queue('user_token', $new_token, 3600 * 24 * 7);
        }else{
            //token保存24个小时
            $response = new \Illuminate\Http\Response();
            $response->withCookie(\Cookie::make('user_token', NULL, -86400));
            $response->withCookie(\Cookie::make('user_token', $new_token, 60 * 24 ));
            return $response;
//            \Cookie::queue('user_token', $new_token, 3600 * 24);
        }

//        return [
//            'code'=>ApiException::GOD_BLESS_YOU,
//            'msg'=>'登录成功'
//        ];
    }

}
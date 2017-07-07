<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/7/4
 * Time: 15:52
 */

namespace App\Http\Logic;

use App\Exceptions\ApiException;
use App\Http\Model\UserModel;
use Galaxy\Framework\Log\Log;

class OperationApi{

    const LIMMIT = 20;

    public function submitLogin($data){
        $res = UserModel::select('*')->where('user_name', $data['user_name'])->first();
        if(empty($res)){
            return false;
        }
        $res = $res->toArray();
        if($res['password'] != md5(md5($data['password']))){
            return false;
        }

        //更新用户登录时间
        UserModel::where('id', $res['id'])->update(['last_login_time'=>time()]);
        if(session_status() == PHP_SESSION_NONE) session_start();
        $_SESSION['user_info'] = $res;
        return true;
    }
    public function getUserList(){
        $res = UserModel::select('*')
                        ->orderBy('id', 'desc')
                        ->paginate(self::LIMMIT);
        return empty($res)? [] : $res;
    }

    public function deleteUser($id){
        $res = UserModel::where('id', $id)->delete();
        if(!empty($res)){
            return true;
        }
        return false;
    }

    public function addUser($data){

    }

    public function getFile($file_name){
        $command = 'ls -a '.$file_name;
        exec($command, $arr);
        return $arr;
    }
}
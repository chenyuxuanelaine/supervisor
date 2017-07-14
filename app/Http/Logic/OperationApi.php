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
use App\User;
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
        $model = new UserModel();
        $model->user_name = $data['user_name'];
        $model->password = md5(md5($data['password']));
        $model->privilege = $data['privilege'];
        $res = $model->save();
        return $res;
    }

    public function getFile($file_name){
        $command = 'ls -a ' . $file_name . '/';
        if($file_name == '/'){
            $command = 'ls '.$file_name;
        }
        exec($command, $arr, $status);
        //$status，0成功，1失败
        if($status == 0){
            return $arr;
        }else{
            return [];
        }
    }

    public function delFile($file_name){
        $command = 'rm -rf ' . $file_name;
        system($command, $status);
        //$status，0成功，1失败
        if($status == 0){
            return true;
        }else{
            return false;
        }
    }

    public function verifyName($name){
        $res = UserModel::select('id')
                        ->where('user_name',$name)
                        ->first();
        if(!empty($res)){
            return false;
        }else{
            return true;
        }
    }

    public function getUser($id){
        $info = UserModel::select('id', 'user_name', 'privilege')->where('id', $id)->first();
        return empty($info)?'':$info->toArray();
    }

    public function editUser($data){
        $model = new UserModel();
        $model = $model->where('id', $data['id']);
        unset($data['id']);
        $res = $model->update($data);
        return $res;
    }

}
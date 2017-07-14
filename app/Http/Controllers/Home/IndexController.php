<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/28
 * Time: 11:14
 */
namespace App\Http\Controllers\Home;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller{
    public function index(Request $request){
        try{
            $token = $request->cookie('user_token');
            $user_info = application()->redis->get('user_info_'.$token);
            $user_info = json_decode($user_info, true);
            $id = $user_info['id'];
            $res = application()->userApi->getPrivilege($id);
            if(!empty($res)){
                return view('Home.index', ['list'=>$res]);
            }else{
                ApiException::throwException(ApiException::NO_PRIVILEGE);
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }

    public function getDirectory(Request $request){
        try{
            $file_name = trim($request->input('file_name', ''));
            $res = application()->operationApi->getFile($file_name);
            if(!empty($res)){
                return $this->response($res);
            }else{
                return $this->error(ApiException::FAIL,'这是个文件');
            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }

    public function delFile(Request $request){
        try{
            $file_name = trim($request->input('file_name', ''));
            $res = application()->operationApi->delFile($file_name);
            var_dump($res);
//            if(!empty($res)){
//                return $this->response($res);
//            }else{
//                return $this->error(ApiException::FAIL,'最后一级目录');
//            }
        }catch(\Exception $e){
            return $this->resException($e);
        }
    }
}
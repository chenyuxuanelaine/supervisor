<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use App\Exceptions\ApiException;
use Galaxy\Framework\Log\Log;
use App\Logic\Api\AdminApi;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $user;

    /**
     * 用户的请求首先在这里经过判断和过滤，才可以访问到真正的服务
     *
     */
    public function __construct(Request $request) {


        $this->user = $request->input("user_info");
        //record operation log
//        self::logRecord($request);
    }

    /**
     * 是否请求的Google Authentication相关页面和方法?
     *
     * @param string $path_info 请求的URI字符串
     * @return boolean
     */
    public function isAccessGA($path_info) {
        $path_info = strtolower($path_info);

        if (strpos($path_info, '/index/ga') !== false) {
            return true;
        }
        return false;
    }


    /**
     * 是否请求的首页?
     *
     * @param string $path_info 请求的URI字符串
     * @return boolean
     */
    public function isAccessIndex($path_info) {
        $path_info = strtolower($path_info);

        $index = '/index/';

        if (strlen($path_info) <= strlen($index)) {
            $end = strlen($path_info);
            $prefix = substr($index, 0, $end);

            if ($prefix == $path_info) {
                return true;
            }
        }

        return false;
    }


    /**
     * 根据每个元素的$pid属性，将一个列表构造成一颗关系树数组，方便进行其他的处理
     *
     * @param array $rows
     * @param string $id
     * @param string $pid
     * @param string $child
     * @param integer $root
     *
     * @return array
     */
    public static function getDataTree($rows, $id ='id', $pid = 'pid', $child = 'child', $root=0) {
        $tree = array();

        if(is_array($rows)){
            $array = array();
            foreach ($rows as $key=>$item){
                $array[$item[$id]] =& $rows[$key];
            }
            foreach($rows as $key=>$item){
                $parentId = $item[$pid];
                if($root == $parentId){
                    $tree[] =&$rows[$key];
                }else{
                    if(isset($array[$parentId])){
                        $parent =&$array[$parentId];
                        $parent[$child][]=&$rows[$key];
                    }
                }
            }
        }
        return $tree;
    }

    /**
     * 返回存在SESSION中的用户信息
     *
     * @param string $field
     *
     * @return string
     */
    public function getUserInfo($field = NULL) {
        if (is_null($field)) {
            return $this->user;
        }

        return isset($this->user[$field]) ? $this->user[$field] : '';
    }


    /**
     * 设置存在SESSION中的用户信息
     *
     * @param array $infos
     */
    public function setUserInfo($infos) {
        $user = $this->getUserInfo();

        foreach ($infos as $key => $value) {
            $user [$key] = $value;
        }

        $this->session_set('user_info', $user);
    }


    /**
     * 返回SESSION中指定字段$key的值，如果不存在返回$default
     *
     * @param string $key
     * @param string $default
     *
     * @return mixed
     */
    public function session_get($key, $default = '') {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        return array_fetch($_SESSION, $key, $default);
    }


    /**
     * 设置SESSION中指定字段$key的值
     *
     * @param string $key
     * @param string $default
     *
     * @return boolean
     */
    public function session_set($key, $value = '') {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (is_array($_SESSION)) {
            $_SESSION [$key] = $value;
            return true;
        }
        return false;
    }




    public function getBaseUrl() {
        return $_SERVER['API_PROTOCOL'].$_SERVER['SERVER_NAME'];
    }


    /**
     * 设置SESSION中指定字段$key的值
     *
     * @param string $key
     * @param string $default
     *
     * @return boolean
     */
    public function promptAndGoto($message, $timer = 0, $url = '') {
        if ($url) {
            $url_chunk = parse_url($url);
            if (!isset($url_chunk['host'])) {
                $url = $this->getBaseUrl().$url;
            }
        }

        if ($url) {
            echo '<meta http-equiv="refresh" content="'.$timer.'; url='.$url.'" />';
        } else {
            echo '<meta http-equiv="refresh" content="'.$timer.'" />';
        }

        echo $message;
        exit;
    }


    /**
     * 设置SESSION中指定字段$key的值
     *
     * @param string $key
     * @param string $default
     *
     * @return boolean
     */
    public function passEncryption($pass) {

        return md5(substr(md5($pass), 7, -7));
    }


    /**
     * 生成谷歌认证专用的二维码，通过base64加密后，才可以直接嵌入img标签里
     *
     * @param string $ga_secret 认证密钥
     *
     * @return string
     */
    public function makeGAQRCode($ga_secret) {

        $qrcode = new BaconQrCodeGenerator;

        return base64_encode($qrcode->format('png')->size(200)->generate('otpauth://totp/Ren_Wo_Hua?secret='.$ga_secret));
    }


    public function dp($data) {
        if (is_array($data)) {
            echo json_encode($data);
        }
        else {
            echo $data;
        }
        exit;
    }

    //正常返回
    public function response($data = [], $msg = '', $code = ApiException::GOD_BLESS_YOU)
    {
        $msg = empty($msg) ? 'successful' : $msg;
        return response()->json(['code' => (string)$code, 'msg' => $msg, 'data' => $data]);
    }
    //错误返回
    public function error($code, $msg = '')
    {
        $msg = empty($msg) ? ApiException::$errorMessages[$code] : $msg;
        return $this->response([], $msg, $code);
    }
    //异常的响应
    protected function resException(\Exception $e, $is_log = true)
    {
        if ($is_log) {
            Log::getLogger()->error(0, 'resException', [$e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine()]);
        }
        $msg_arr = explode(' ', $e->getMessage());
        $msg = empty($msg_arr[0]) ? $e->getMessage() : $msg_arr[0];
        return $this->error($e->getCode(), $msg);
    }
    /**
     * 响应json
     * @param array $data
     * @param string $message
     * @param int $code
     */
    protected function responseJson($data = [], $message = '', $code=ApiException::GOD_BLESS_YOU){
        if (empty($message)) {
            $message = 'successful';
        }

        if (true === $data) {
            $data = [];
        }

        return response()->json(['data' => $data, 'code' => $code, 'message' => $message], 200);
    }


    /**
     *
     * 记录日志
     */
    final private function logRecord(Request $request) {
        //判断是否记录
        if (defined('DONT_RECORD_LOG') && DONT_RECORD_LOG==TRUE) {
            return FALSE;
        }
        $user_info = $this->getUserInfo();
        AdminApi::logRecord($request, $user_info);
    }

}

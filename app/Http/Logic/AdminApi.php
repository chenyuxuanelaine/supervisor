<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/27
 * Time: 15:39
 */

namespace App\Http\Logic;

use App\Logic\Module\Admin\AdminLogic;
use Illuminate\Http\Request;
class AdminApi
{

    public static function logRecord(Request $request, $user_info)
    {
        //判断是否记录
        if (defined('DONT_RECORD_LOG') && DONT_RECORD_LOG == TRUE) {
            return FALSE;
        }
        if (empty($user_info['id'])) {
            return false;
        }
        $user_id = $user_info['id'];
        $user_name = $user_info['username'];
        $rout_info = $request->route();
        if (empty($rout_info[1]['uses'])) {
            return false;
        }
        $method = $request->getMethod();
        list($class, $action) = explode('@', $rout_info[1]['uses']);
        $controller = class_basename($class);
        $namespace = str_replace('\\' . $controller, '', $class);
        $ip = $request->getClientIp();
        $path_info = $request->getPathInfo();
        $query_string = $request->getQueryString() ? : '';

        AdminLogic::saveLog(
            $user_id,
            $user_name,
            $method,
            $namespace,
            $controller,
            $action,
            $path_info,
            $query_string,
            $ip
        );
    }
}

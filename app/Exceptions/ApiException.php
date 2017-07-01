<?php
/**
 * Created by PhpStorm.
 * User: wangh
 * Date: 15/12/22
 * Time: 下午8:08
 */

namespace App\Exceptions;


class ApiException extends \Exception
{
    //请按照code 大小顺序添加

    const GOD_BLESS_YOU = 1000;
    const INVALID_DATA = 10002;
    const DATA_LACK = 10003;
    const DATA_UPDATE_ERROR = 10004;
    const DATA_INSERT_ERROR = 10005;
    const NAME_EXISTS = 10006;
    const REGISTER_FAIL = 10007;
    const ACCOUNT_EXISTS = 10008;
    const LOGIN_FAIL = 10009;
    const PLEASE_RELOGIN = 10010;
    const RESET_PASSWORD_FAIL = 10011;

    public static $errorMessages = [
        self::INVALID_DATA => '无效的数据格式',
        self::DATA_LACK => '提交数据不完整',
        self::DATA_UPDATE_ERROR => '数据更新失败',
        self::DATA_INSERT_ERROR => '数据添加失败',
        self::NAME_EXISTS => '数据已存在',
        self::REGISTER_FAIL => '注册失败',
        self::ACCOUNT_EXISTS => '用户手机号已存在',
        self::LOGIN_FAIL => '登录失败',
        self::PLEASE_RELOGIN => '您的登录已经失效, 请重新登录',
        self::RESET_PASSWORD_FAIL =>'密码重置失败',
    ];

    public static function throwException($code, $msg = '')
    {
        if (!empty($msg)) {
            $message = $msg;
        } elseif (!empty(self::$errorMessages[$code])) {
            $message = self::$errorMessages[$code];
        } else {
            $message = "未知错误[{$code}]";
        }

        if (!isProduction()) {
            $e = debug_backtrace()[0];
            $file = $e['file'];
            $line = $e['line'];
            throw new self($message . " " . $file . " " . $line, $code);
        }
        throw new self($message, $code);
    }
}

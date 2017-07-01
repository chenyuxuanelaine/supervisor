<?php

if (!function_exists("application")) {
    function application() {
        return \App\Application::one();
    }
}

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if (!function_exists('get_gis_distance')) {
    /**
     * @desc 根据两点间的经纬度计算距离
     * @param float $lat 纬度值
     * @param float $lng 经度值
     */
    function get_gis_distance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000; //approximate radius of earth in meters

        /*
        Convert these degrees to radians
        to work with the formula
        */

        $lat1 = ($lat1 * pi() ) / 180;
        $lng1 = ($lng1 * pi() ) / 180;

        $lat2 = ($lat2 * pi() ) / 180;
        $lng2 = ($lng2 * pi() ) / 180;

        /*
        Using the
        Haversine formula

        http://en.wikipedia.org/wiki/Haversine_formula

        calculate the distance
        */

        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;

        return round($calculatedDistance);
    }
}

//if (!function_exists("redirect"))
//{
//    /**
//     * 返回301重定向，重定向地址自身协议和域名端口信息不改变，只改变URI
//     */
//    function redirect($uri) {
//    @header("Location: ".$_SERVER['API_PROTOCOL'].$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$uri);
//    exit();
//    }
//
//}

if (!function_exists('array_fetch'))
{
    function array_fetch($array, $key, $default = '') {
        if (!is_array($array)) {
            return $default;
        }
        return isset($array[$key]) ? $array[$key] : $default;
    }
}


if (!function_exists('microtime_float')) {
    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}

if (!function_exists('get_user_ip')) {
    function get_user_ip()
    {
        if (!empty($_SERVER["HTTP_X_REAL_IP"])) {
            return $_SERVER["HTTP_X_REAL_IP"];
        }

        if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }

        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            return $_SERVER["HTTP_CLIENT_IP"];
        }

        if (!empty($_SERVER["REMOTE_ADDR"])) {
            return $_SERVER["REMOTE_ADDR"];
        }

        return '';
    }
}

if (!function_exists('get_sql')) {
    // 供debug执行过程中sql操作，同时写入文件日志，正式环境不开启
    function get_sql()
    {
        $formattedQueries = [];

        if (env('APP_ENV') != 'production') {
            $queries = DB::getQueryLog();
            foreach ($queries as $query) {
                $prep = $query['query'];
                foreach ($query['bindings'] as $binding) {
                    $prep = preg_replace("#\?#", $binding, $prep, 1);
                }

                $formattedQueries[] = $prep;
            }
            \Galaxy\Framework\Log\Log::getLogger()->debug(0, 'debug_get_sql', $formattedQueries);
        }

        return $formattedQueries;
    }
}


if (!function_exists('half_replace') ) {
    function half_replace($str) {
        $len = strlen($str);
        return str_replace($str, str_repeat('*', $len), ceil(($len) / 2, $len));
    }
}

if (!function_exists('gzdecode')) {
    function gzdecode ($data) {
        $flags = ord(substr($data, 3, 1));
        $headerlen = 10;
        $extralen = 0;
        $filenamelen = 0;
        if ($flags & 4) {
            $extralen = unpack('v' ,substr($data, 10, 2));
            $extralen = $extralen[1];
            $headerlen += 2 + $extralen;
        }
        if ($flags & 8) // Filename
            $headerlen = strpos($data, chr(0), $headerlen) + 1;
        if ($flags & 16) // Comment
            $headerlen = strpos($data, chr(0), $headerlen) + 1;
        if ($flags & 2) // CRC at end of file
            $headerlen += 2;
        $unpacked = @gzinflate(substr($data, $headerlen));
        if ($unpacked === FALSE)
            $unpacked = $data;
        return $unpacked;
    }
}

if (!function_exists('get_request_path') ) {

    function get_request_path() {

        if (isset($_SERVER['PATH_INFO'])) {
            return $_SERVER['PATH_INFO'];
        }

        $request_path = parse_url(!empty($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'');

        return $request_path['path'];
    }
}
/**
 * 是否为生成环境
 * @return bool
 */
function isProduction(){
    return env('APP_ENV') == 'production' || env('APP_ENV') == 'prod';
}
function myDump($valS, $isExit = true, $isPre = true){
    call_user_func_array(array('\App\Lib\Helpers\Debug', PHP_SAPI != 'cli' ? 'dump':'cliDump'), func_get_args());
}
function fileDump($val){
    call_user_func_array(array('\App\Lib\Helpers\Debug', 'fileDump'), func_get_args());
}
function showExceptionTrace(\Exception $e, $isExit = true, $is_return = false, $ispre = true){
    if($is_return){
        ob_start();
    }
    call_user_func_array(array('\App\Lib\Helpers\Debug', (PHP_SAPI != 'cli' && $ispre == true) ? 'showExceptionBacktrace':'cliShowExceptionBacktrace'), func_get_args());
    if($is_return){
        $outStr =  ob_get_contents();
        ob_end_clean();
        return $outStr;
    }
}
//美化输出--方便调试
if (!function_exists('p') ) {

    function p($result)
    {
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
        exit;
    }
}

// 密码加密算法
if (!function_exists('passEncryption') ) {

    function passEncryption($pass)
    {
        return md5(substr(md5($pass), 7, -7));
    }
}

//二维数组的排序
//$array 要排序的数组
//$row  排序依据列
//$type 排序类型[asc or desc]
//return 排好序的数组
//if (!function_exists('array_sort') ) {
//
//    function array_sort($array,$row,$type='asc'){
//        $array_temp = array();
//        foreach($array as $v){
//            $array_temp[$v[$row]] = $v;
//        }
//        if($type == 'asc'){
//            ksort($array_temp);
//        }elseif($type='desc'){
//            krsort($array_temp);
//        }else{
//        }
//        return $array_temp;
//    }
//
//}





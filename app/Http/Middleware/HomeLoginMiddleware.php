<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/28
 * Time: 17:34
 */

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;

class HomeLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->cookie('user_token');
//        $token = \Cookie::get('user_token');
        if(!empty($token)){
            $user_info = application()->redis->get('user_info_'.$token);
            if(!empty($user_info)){
                return $next($request);
            }
        }
//        ApiException::throwException(ApiException::PLEASE_RELOGIN);
        return view('Home.login');
    }
}

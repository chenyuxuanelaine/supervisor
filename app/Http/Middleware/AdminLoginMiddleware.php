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

class AdminLoginMiddleware
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
        // 判断是否有session
        if (session_status() == PHP_SESSION_NONE) session_start();
        if(empty($_SESSION['user_info'])){
            return view('Admin.login');
        }
        return $next($request);
    }
}

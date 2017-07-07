<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/28
 * Time: 11:14
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller{
    public function index(Request $request){
        $token = $request->cookie('user_token');
        $user_info = application()->redis->get('user_info_'.$token);
        $user_info = json_decode($user_info, true);
        application()->operationApi->getFile();
        return view('Home.index');
    }
}
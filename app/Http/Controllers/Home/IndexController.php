<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/28
 * Time: 11:14
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class IndexController extends Controller{
    public function index(){
        return view('Home.index');
    }
}
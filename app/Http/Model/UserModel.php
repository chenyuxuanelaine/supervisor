<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/6/27
 * Time: 10:45
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{

    protected $connection = 'mysql';
    protected $table = 's_user';

    const USER_VALID = 1;//用户有效
    const USER_UNVALID = 0;//用户无效
}
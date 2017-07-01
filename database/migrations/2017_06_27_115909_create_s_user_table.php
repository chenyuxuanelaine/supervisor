<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_user', function (Blueprint $table) {
            $table->increments('id')->comment('用户注册账户表');
            $table->string('user_name', 32)->default('')->comment('用户名');
            $table->string('account', 20)->default('')->comment('手机号');
            $table->string('password', 255)->default('')->comment('密码');
            $table->unsignedTinyInteger('status')->default(1)->comment('用户登录状态, 0无效 1有效');
            $table->unsignedInteger('last_login_time')->default(0)->comment('上次登录时间');
            $table->timestamps();
            $table->unique('account');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_user');
    }
}

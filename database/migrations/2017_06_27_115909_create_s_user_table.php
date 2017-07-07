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
            $table->increments('id')->comment('用户账户表');
            $table->string('user_name', 32)->default('')->comment('用户名');
            $table->string('password', 255)->default('')->comment('密码');
            $table->string('privilege', 255)->default('')->comment('文件权限目录');
            $table->unsignedInteger('last_login_time')->default(0)->comment('上次登录时间');
            $table->timestamps();
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

<?php
/**
 * Created by PhpStorm.
 * User: fanxi
 * Date: 2017/4/19
 * Time: 下午7:52
 */

return [
    /**
     * log 输出方式
     * file : 以文件方式输出日志
     * rabbitmq : 将消息以rabbitmq的消发送到log
     * flume  : 使用flume 的方式收集日志
     */
    'type' => env("LOG_WRITER_TYPE", "file"),

    /**
     * log 记录类型
     */
    'level' => env("LOG_LEVEL", Galaxy\Framework\Contracts\Service\Log::INFO),


    /**
     * 以文件为日志输出方式时需要指定日志的记录文件夹
     */
    "file" => [
        'path' => env("LOG_FILE_PATH", "/tmp/galaxy/"),
    ],

    /**
     * 以queue 为日志输出通道时的配置信息
     * zookeeper name
     * kafka 的配置信息
     */
    "queue" => [
        'host'  => env('LOG_QUEUE_HOST', "localhost:9092"),
        'topic' => env('Log_QUEUE_NAME', "log")
    ],

    /**
     * 监控目录
     */
    "monitor" => env("LOG_MONITOR_PATH", "/tmp/monitor"),

    'path' => env("LOG_FILE_PATH", "/tmp/galaxy/"),

    'file_name' => env("LOG_FILE_NAME", 'framework'),

];
<?php
/**
 * Created by PhpStorm.
 * User: wanghui
 * Date: 15/12/17
 * Time: 下午2:28
 */

return [
    'host' => env('RABBITMQ_QUEUE_HOST', 'localhost'),
    'port' => env('RABBITMQ_QUEUE_PORT', '5672'),
    'user' => env('RABBITMQ_QUEUE_USER', 'guest'),
    'pass' => env('RABBITMQ_QUEUE_PASS', 'guest'),
    'vhost' => env('RABBITMQ_QUEUE_VHOST', '/'),
];

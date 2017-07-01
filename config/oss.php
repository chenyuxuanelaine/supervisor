<?php
/**
 * Created by PhpStorm.
 * User: elaine
 * Date: 2017/5/16
 * Time: 16:30
 */
return [
    'ossServer' => env('OSS_SERVER'), //青岛为 http://oss-cn-qingdao.aliyuncs.com
    'ossServerInternal' => env('OSS_SERVER_INTERNAL'), //青岛为 http://oss-cn-qingdao-internal.aliyuncs.com
    'ossUseInternal' => env('OSS_USE_INTERNAL', 0),
    'AccessKeyId' => env('OSS_ACCESS_KEY_ID'),
    'AccessKeySecret' => env('OSS_ACCESS_KEY_SECRET'),
    'bucketXc' => [
        'bucket' => env('OSS_XC_PUB_BUCKET'),
        'url' => env('OSS_XC_PUB_URL')
    ]
];


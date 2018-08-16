<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 13:35
 * Comment: 短信验证码验证器
 */
namespace app\index\validate;

class Sms extends BasicValidate {

    //手机验证正则表达式
    protected $regex = [ 'mobile' => '/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(166)|(19([8,9]))|(18[0,5-9]))\d{8}$/'];

    //验证规则
    protected $rule = [
        'mobile'        => 'require|length:11|regex:mobile'
    ];

    //验证消息
    protected $message = [

    ];

    //验证字段
    protected $field = [
        'mobile'        => '手机号码'
    ];

    //验证场景
    protected $scene = [
        'attain'        => ['mobile']
    ];
}
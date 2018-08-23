<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 11:16
 * Comment: 活动验证器
 */

namespace app\index\validate;

class Activity extends BasicValidate {

    //手机验证正则表达式
    protected $regex = [ 'mobile' => '/^(13[0-9]|14[579]|15[0-3,5-9]|16[6]|17[0135678]|18[0-9]|19[89])\d{8}$/'];

    //验证规则
    protected $rule = [
        'id'                => 'number',
        'page_size'         => 'number',
        'jump_page'         => 'number',
        'activity_id'       => 'require',
        'username'          => 'max:60',
        'mobile'            => 'number|length:11',
        'email'             => 'email',
        'industry'          => 'max:255',
        'occupation'        => 'max:255',
        'company'           => 'max:255',
    ];

    //验证消息
    protected $message = [

    ];

    //验证领域
    protected $field = [
        'id'                => '活动主键',
        'page_size'         => '分页大小',
        'jump_page'         => '跳转页'
    ];

    //验证场景
    protected $scene = [
        'index'             => ['page_size' => 'number', 'jump_page' => 'number'],
        'detail'            => ['id' => 'require|number'],
        'apply'             => ['id' => 'require|number', 'username' => 'require|max:60', 'mobile' => 'require|length:11|regex:mobile', 'email' => 'require|email', 'industry' => 'require|max:255', 'occupation' => 'require|max:255', 'company' => 'require|max:255']
    ];
}
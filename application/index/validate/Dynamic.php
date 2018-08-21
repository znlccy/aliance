<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 15:10
 * Comment: 动态验证器
 */

namespace app\index\validate;

class Dynamic extends BasicValidate {

    //验证规则
    protected $rule = [
        'id'                => 'number',
        'page_size'         => 'number',
        'jump_page'         => 'number',
    ];

    //验证消息
    protected $message = [

    ];

    //验证领域
    protected $field = [
        'id'                => '动态主键',
        'page_size'         => '分页大小',
        'jump_page'         => '跳转页'
    ];

    //验证场景
    protected $scene = [
        'index'             => ['page_size' => 'number', 'jump_page' => 'number'],
        'detail'            => ['id' => 'require|number']
    ];
}
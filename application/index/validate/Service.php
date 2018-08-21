<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 10:07
 * Comment: 服务验证器
 */

namespace app\index\validate;

class Service extends BasicValidate {

    //验证规则
    protected $rule = [
        'id'                => 'number',
        'page_size'         => 'number',
        'jump_page'         => 'number',
        'category_id'       => 'number'
    ];

    //验证消息
    protected $message = [

    ];

    //验证领域
    protected $field = [
        'id'                => '服务主键',
        'category_id'       => '服务栏目主键',
        'page_size'         => '分页大小',
        'jump_page'         => '跳转页'
    ];

    //验证场景
    protected $scene = [
        'index'             => ['page_size' => 'number', 'jump_page' => 'number'],
        'detail'            => ['id' => 'require|number']
    ];
}
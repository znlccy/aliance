<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:33
 * Comment: 分组验证器
 */

namespace app\admin\validate;

class Group extends BasisValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'name'          => 'max:160',
        'sort'          => 'number',
        'create_start'  => 'date',
        'create_end'    => 'date'
    ];

    //验证消息
    protected $message = [

    ];

    //验证字段
    protected $field = [
        'id'            => '分组ID',
        'name'          => '分组名称',
        'sort'          => '分组排序',
        'create_start'  => '分组创建起始时间',
        'create_end'    => '分组创建截止时间'
    ];

    //验证场景
    protected $scene = [
        'entry'         => ['id' => 'number', 'name' => 'max:160', 'sort' => 'number', 'create_start' => 'date', 'create_end' => 'date', 'page_size' => 'number', 'jump_page' => 'number'],
        'save'          => ['id' => 'number', 'name' => 'require|max:160', 'sort' => 'require|number'],
        'detail'        => ['id' => 'require|number'],
        'delete'        => ['id' => 'require|number']
    ];
}
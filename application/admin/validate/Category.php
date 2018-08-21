<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 10:47
 * Comment: 分类验证器
 */

namespace app\admin\validate;

class Category extends BasisValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'name'          => 'max:255',
        'status'        => 'number',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $message = [

    ];

    //验证字段
    protected $field = [
        'id'            => '服务类目主键',
        'name'          => '服务类目名称',
        'status'        => '服务类目状态',
        'create_start'  => '服务类目创建起始时间',
        'create_end'    => '服务类目创建截止时间',
        'update_start'  => '服务类目更新起始时间',
        'update_end'    => '服务类目更新截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    protected $scene = [
        'entry'         => ['id' => 'number', 'name' => 'max:255', 'status' => 'number', 'create_start' => 'date', 'create_end' => 'date', 'update_start' => 'date', 'update_end' => 'date', 'page_size' => 'number', 'jump_page' => 'number'],
        'save'          => ['id' => 'number', 'name' => 'require|max:255', 'status' => 'require|number'],
        'detail'        => ['id' => 'require|number'],
        'delete'        => ['id' => 'require|number']
    ];
}
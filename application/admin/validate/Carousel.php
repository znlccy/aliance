<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 14:26
 * Comment: 轮播验证器
 */

namespace app\admin\validate;

class Carousel extends BasisValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'title'         => 'max:80',
        'url'           => 'url',
        'sort'          => 'number',
        'status'        => 'number',
        'publish_time'  => 'date',
        'create_start'  => 'date',
        'create_end'    => 'date',
        'update_start'  => 'date',
        'update_end'    => 'date',
        'publish_start' => 'date',
        'publish_end'   => 'date',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证消息
    protected $message = [

    ];

    //验证字段
    protected $field = [
        'id'            => '轮播主键',
        'title'         => '轮播标题',
        'url'           => '轮播URL地址',
        'sort'          => '轮播排序',
        'status'        => '轮播状态',
        'create_start'  => '轮播创建起始时间',
        'create_end'    => '轮播创建截止时间',
        'update_start'  => '轮播更新起始时间',
        'update_end'    => '轮播更新截止时间',
        'publish_start' => '轮播发布起始时间',
        'publish_end'   => '轮播发布截止时间',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    protected $scene = [
        'entry'         => ['id' => 'number', 'title' => 'max:80', 'url' => 'url', 'sort' => 'number|min:1', 'status' => 'number', 'create_start' => 'date', 'create_end' => 'date', 'update_start' => 'date', 'update_end' => 'date', 'publish_start' => 'date', 'publish_end' => 'date'],
        'save'          => ['id' => 'number', 'title' => 'require|max:80', 'url' => 'url', 'sort' => 'require|number', 'status' => 'require|number', 'publish_time' => 'date'],
        'detail'        => ['id' => 'require|number'],
        'delete'        => ['id' => 'require|number']
    ];
}
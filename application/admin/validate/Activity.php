<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 11:12
 * Comment: 活动验证器
 */

namespace app\admin\validate;

class Activity extends BasisValidate {

    //验证规则
    protected $rule = [
        'id'            => 'number',
        'title'         => 'max:80',
        'content'       => 'max:600',
        'picture'       => 'max:255',
        'limit'         => 'number',
        'register'      => 'number',
        'status'        => 'number',
        'address'       => 'max:180',
        'location'      => 'max:800',
        'begin_time'    => 'date',
        'end_time'      => 'date',
        'apply_time'    => 'date',
        'begin_time_start'=> 'date',
        'begin_time_end'=> 'date',
        'end_time_start'=> 'date',
        'end_time_end'  => 'date',
        'apply_time_start'=> 'date',
        'apply_time_end'=> 'date',
        'audit_method'  => 'number',
        'page_size'     => 'number',
        'jump_page'     => 'number'
    ];

    //验证信息
    protected $message = [

    ];

    //验证字段
    protected $field = [
        'id'            => '活动主键',
        'title'         => '活动标题',
        'content'       => '活动内容',
        'picture'       => '活动图片',
        'limit'         => '人数限制',
        'register'      => '报名人数',
        'status'        => '活动状态',
        'address'       => '活动简写地址',
        'location'      => '活动详细地址',
        'begin_time'    => '活动开始时间',
        'end_time'      => '活动截止时间',
        'apply_time'    => '活动报名时间',
        'begin_time_start'=> '活动开始起始时间',
        'begin_time_end'=> '活动开始结束时间',
        'end_time_start'=> '活动截止起始时间',
        'end_time_end'  => '活动截止结束时间',
        'apply_time_start'=> '活动报名起始时间',
        'apply_time_end'=> '活动报名截止时间',
        'audit_method'  => '审核方式',
        'page_size'     => '分页大小',
        'jump_page'     => '跳转页'
    ];

    //验证场景
    protected $scene = [
        'entry'         => ['id' => 'number', ''],
        'save'          => ['id' => 'number', 'title' => 'require|max:80', 'content' => 'require', 'limit' => 'require|number|min:0', 'address' => 'require', 'location' => 'require', 'apply_time' => 'require|gt:end_time', 'begin_time' => 'require', 'end_time' => 'require|gt:begin_time', 'audit_method' => 'require'],
        'detail'        => ['id' => 'require|number'],
        'delete'        => ['id' => 'require|number']
    ];
}
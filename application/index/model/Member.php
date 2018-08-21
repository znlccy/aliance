<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 17:26
 * Comment: 活动成员模型
 */

namespace app\index\model;

class Member extends BasicModel {

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_user';
}
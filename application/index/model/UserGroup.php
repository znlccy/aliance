<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/22
 * Time: 16:38
 * Comment: 用户组模型
 */

namespace app\index\model;

class UserGroup extends BasicModel {

    /**
     * 自动获取写入时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_user_group';
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:33
 * Comment: 成员分组模型
 */

namespace app\admin\model;

class Group extends BasisModel {

    /**
     * 自动写入时间
     * @var bool
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_group';

    /**
     * 关联用户表
     */
    public function user() {
        return $this->hasMany('User','user_id', 'id');
    }
}
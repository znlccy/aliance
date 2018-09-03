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


    /**
     * @return \think\model\relation\HasOne
     * 关联用户
     */
    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }

    /**
     * @return \think\model\relation\HasOne
     * 关联用户分组
     */
    public function userGroup()
    {
        return $this->hasOne('Group', 'id', 'group_id');
    }
}
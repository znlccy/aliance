<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:33
 * Comment: 成员模型
 */

namespace app\admin\model;

class User extends BasisModel {

    /**
     * 自动写入读取时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    protected $createTime = 'create_time';

    protected $updateTime = 'update_time';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_user';


}
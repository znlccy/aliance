<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:03
 * Comment: 权限模型
 */
namespace app\admin\model;

class Permission extends BasisModel {

    /**
     * 自动写入和读取时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_permission';

}
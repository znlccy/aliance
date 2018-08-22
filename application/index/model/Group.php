<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/22
 * Time: 16:37
 * Comment: 分组模型
 */

namespace app\index\model;

class Group extends BasicModel {

    /**
     * 自动读取和写入时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_group';

}
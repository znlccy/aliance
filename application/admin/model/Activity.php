<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 10:59
 * Comment: 活动模型
 */

namespace app\admin\model;

class Activity extends BasisModel {

    /**
     * 自动写入和读取时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_activity';

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/21
 * Time: 18:45
 * Comment: 栏目模型
 */

namespace app\index\model;

class Column extends BasicModel {

    /**
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_column';
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/17
 * Time: 14:25
 * Comment: 轮播模型
 */

namespace app\admin\model;

class Carousel extends BasisModel {

    /**
     * 自动写入读取时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_carousel';
}
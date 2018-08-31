<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 18:18
 * Comment: 动态模型
 */
namespace app\index\model;

class Dynamic extends BasicModel {

    /**
     * 自动写入读取时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_dynamic';

    /**
     * @param $value
     * @return string
     */
    public function setRichtextAttr($value)
    {
        return htmlspecialchars($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getRichtextAttr($value)
    {
        return htmlspecialchars_decode($value);
    }
}

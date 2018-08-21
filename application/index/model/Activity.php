<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 18:18
 * Comment: 活动模型
 */
namespace app\index\model;

class Activity extends BasicModel {

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_activity';

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

    /**
     * @param $value
     * @return false|string
     */
    public function getApplytimeAttr($value)
    {
        $week_array = ["日","一","二","三","四","五","六"];

        $return = date("Y年m月d日",strtotime($value));
        $return .= " 星期".$week_array[date("w",strtotime($value))];
        $return .= date(" H:i",strtotime($value));
        return $return;

    }

    /**
     * @param $value
     * @return false|string
     */
    public function getBegintimeAttr($value)
    {
        if (date("H",strtotime($value)) == 0) {
            return date("Y-m-d",strtotime($value));
        }else{
            return date("Y-m-d H:i",strtotime($value));
        }
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getEndtimeAttr($value)
    {
        if (date("H",strtotime($value)) == 0) {
            return date("Y-m-d",strtotime($value));
        }else{
            return date("Y-m-d H:i",strtotime($value));
        }
    }
}

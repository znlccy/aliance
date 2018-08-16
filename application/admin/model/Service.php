<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:12
 * Comment: 服务资源管理
 */

namespace app\admin\model;

class Service extends BasisModel {

    /**
     * 自动写入时间
     * @var string
     */
    protected $autoWriteTimestamp = 'datetime';

    /**
     * 关联的数据表
     * @var string
     */
    protected $table = 'tb_service';

    /**
     * 编译富文本
     * @param $value
     * @return string
     */
    protected function setRichtextAttr($value) {
        return htmlspecialchars($value);
    }

    /**
     * 反编译富文本
     * @param $value
     * @return string
     */
    protected function getRichtextAttr($value) {
        return htmlspecialchars_decode($value);
    }

    /**
     * 关联的数据表
     * @return \think\model\relation\HasOne
     */
    public function category() {
        return $this->hasOne('Category', 'id', 'category_id');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 13:36
 * Comment: 轮播控制器
 */

namespace app\admin\controller;

use app\admin\model\Carousel as CarouselModel;
use app\admin\validate\Carousel as CarouselValidate;
use think\Request;

class Carousel extends BasisController {

    protected $carousel_model;

    protected $carousel_validate;

    protected $carousel_page;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    public function entry() {

    }

    public function save() {

    }

    public function detail() {

    }

    public function delete() {

    }
}
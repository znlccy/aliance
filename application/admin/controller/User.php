<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:32
 * Comment: 联盟成员控制器
 */

namespace app\admin\controller;

use think\Request;

class User extends BasisController {

    /**
     * @var
     */
    protected $user_model;

    /**
     * @var
     */
    protected $user_validate;

    /**
     * @var
     */
    protected $user_page;

    /**
     * 默认构造函数
     * User constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
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
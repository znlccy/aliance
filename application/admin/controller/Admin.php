<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:03
 * Comment: 管理员控制器
 */
namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;

class Admin extends BasisController {

    protected $admin_model;

    protected $admin_validate;

    protected $sms_model;

    /**
     * 管理员手机登录
     */
    public function mobile_login() {

    }
}
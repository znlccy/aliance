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
use app\admin\validate\Admin as AdminValidate;
use app\admin\model\Role as RoleModel;
use app\admin\model\Sms as SmsModel;
use think\Request;
use think\Session;

class Admin extends BasisController {

    /**
     * 声明管理员模型
     * @var
     */
    protected $admin_model;

    /**
     * 声明角色模型
     * @var
     */
    protected $role_model;

    /**
     * 声明短信验证码模型
     * @var
     */
    protected $sms_model;

    /**
     * 管理员验证器
     * @var
     */
    protected $admin_validate;

    /**
     * 默认构造函数
     * Admin constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->admin_model = new AdminModel();
        $this->admin_validate = new AdminValidate();
        $this->role_model = new RoleModel();
        $this->sms_model = new SmsModel();
    }

    /**
     * 管理员手机登录api接口
     */
    public function mobile_login() {
        //获取客户端提供的数据

    }

    /**
     * 管理员账号登录api接口
     */
    public function account_login() {

    }

    /**
     * 管理员列表api接口
     */
    public function entry() {

    }

    /**
     * 管理员详情api接口
     */
    public function detail() {

    }

    /**
     * 角色下拉列表
     */
    public function spinner() {

    }

    /**
     * 管理员个人信息api接口
     */
    public function info() {

    }

    /**
     * 管理员修改密码接口
     */
    public function change_password() {

    }

    /**
     * 管理员
     */
    public function logout() {
        Session::delete('admin');
        Session::delete('admin_token');
    }
}

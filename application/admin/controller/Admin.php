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
        //获取用户手机
        $admin = Session::get('admin');
        //获取用户id
        $id = $admin['id'];

        //返回数据
        if ($id) {
            $admin_data = $this->admin_model->where('id', $id)->find();
            return json([
                'return'        => '200',
                'message'       => '查询数据成功',
                'data'          => $admin_data
            ]);
        } else {
            return json([
                'return'        => '404',
                'message'       => '查询数据失败',
            ]);
        }
    }

    /**
     * 管理员修改密码api接口
     */
    public function change_password() {

        //获取客户端提交过来的数据
        $password = request()->param('password');
        $confirm_pass = request()->param('confirm_pass');

        //验证数据
        $validate_data = [
            'password'      => $password,
            'confirm_pass'  => $confirm_pass
        ];

        //验证结果
        $result = $this->admin_validate->scene('info')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->admin_validate->getError()
            ]);
        }

        //获取Session中的数据
        $admin = Session::get('admin');
        /*$id = $admin['id'];*/
        $id = 1;

        //返回数据
        if ($id) {
            $update_data = [
                'password'      => md5($password)
            ];
            $this->admin_model->save($update_data, ['id' => $id]);
            return json([
                'code'      => '200',
                'message'   => '更新密码成功'
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '更新密码失败'
            ]);
        }
    }

    /**
     * 管理员退出api接口
     * @return \think\response\Json
     */
    public function logout() {
        Session::delete('admin');
        Session::delete('admin_token');
        if (Session::get('admin') == null && Session::get('admin_token') == null) {
            return json([
                'code'      => '200',
                'message'   => '管理员退出成功'
            ]);
        } else {
            return json([
                'code'      => '401',
                'message'   => '管理员退出失败'
            ]);
        }
    }
}

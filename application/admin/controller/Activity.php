<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:17
 * Comment: 活动控制器
 */

namespace app\admin\controller;

use app\admin\model\Activity as ActivityModel;
use app\admin\validate\Activity as ActivityValidate;
use think\Request;

/**
 * Class Activity
 * @package app\admin\controller
 */
class Activity extends BasisController {

    /**
     * 声明活动模型
     * @var
     */
    protected $activity_model;

    /**
     * 声明活动验证器
     * @var
     */
    protected $activity_validate;

    /**
     * 声明活动分页器
     * @var
     */
    protected $activity_page;

    /**
     * 默认构造函数
     * Activity constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->activity_model = new ActivityModel();
        $this->activity_validate = new ActivityValidate();
        $this->activity_page = config('pagination');
    }

    /**
     * 活动列表api接口
     */
    public function entry() {

    }

    /**
     * 活动添加更新api接口
     */
    public function save() {
        /* 获取前端提交的数据 */
        $id = request()->param('id');
        $title       = request()->param('title');
        $content     = request()->param('content');
        $recommend   = request()->param('recommend', 0);
        $picture     = request()->file('picture');
        $limit       = request()->param('limit');
        $register    = request()->param('register', 0);
        $status      = request()->param('status', 1);
        $address     = request()->param('address');
        $location    = request()->param('location');
        $apply_time  = request()->param('apply_time');
        $begin_time  = request()->param('begin_time');
        $end_time    = request()->param('end_time');
        $audit_method= request()->param('audit_method', 0);
        $rich_text   = request()->param('rich_text');

        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                /*echo '文件保存的名:' . $info->getFilename();*/
                $sub_path     = str_replace('\\', '/', $info->getSaveName());
                $picture = '/images/' . $sub_path;
            }
        }

        //验证数据
        $validate_data = [
            'title'       => $title,
            'content'     => $content,
            'recommend'   => $recommend,
            'picture'     => $picture,
            'limit'       => $limit,
            'register'    => $register,
            'status'      => $status,
            'address'     => $address,
            'location'    => $location,
            'apply_time'  => $apply_time,
            'begin_time'  => $begin_time,
            'end_time'    => $end_time,
            'audit_method'=> $audit_method,
            'rich_text'   => $rich_text,
        ];

        //验证结果
        $result   = $this->activity_validate->scene('save')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->activity_validate->getError()]);
        }

        //返回结果
        if (!empty($id)) {
            if (empty($picture)) {
                unset($validate_data['picture']);
            }
            $result = $this->activity_model->save($validate_data,['id' => $id]);
        } else {
            $result = $this->activity_model->save($validate_data);
        }
        if ($result) {
            $data = ['code' => '200', 'message' => '保存成功!'];
            return json($data);
        } else {
            $data = ['code' => '404', 'message' => '保存失败!'];
            return json($data);
        }
    }

    /**
     * 获取活动详情api接口
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function detail() {
        //获取客户端提交的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->activity_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->activity_validate->getError()
            ]);
        }

        //返回数据
        $service = $this->activity_model->where('id', $id)->find();
        if ($service) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $service
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败,数据不存在'
            ]);
        }
    }

    /**
     * 删除活动api接口
     * @return \think\response\Json
     */
    public function delete() {
        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->activity_validate->scene('delete')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->activity_validate->getError()
            ]);
        }

        //返回结果
        $delete = $this->activity_model->where('id', $id)->delete();
        if ($delete) {
            return json([
                'code'      => '200',
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => '401',
                'message'   => '删除数据失败'
            ]);
        }
    }
}
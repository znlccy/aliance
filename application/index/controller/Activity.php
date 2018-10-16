<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 18:26
 * Comment: 活动控制器
 */

namespace app\index\controller;

use app\index\model\Activity  as ActivityModel;
use app\index\validate\Activity as ActivityValidate;
use app\index\model\UserActivity as UserActivityModel;
use think\Request;
use think\Session;

class Activity extends BasicController {

    /**
     * 声明活动模型
     * @var
     */
    protected $activity_model;

    /**
     * 声明用户活动模型
     * @var
     */
    protected $user_activity_model;

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
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->activity_model = new ActivityModel();
        $this->user_activity_model = new UserActivityModel();
        $this->activity_validate = new ActivityValidate();
        $this->activity_page = config('pagination');
    }

    /**
     * 沙龙活动首页json数据
     */
    public function index()
    {
        /* 获取客户端提交过来的数据 */
        $page_size = request()->param('page_size', $this->activity_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->activity_page['JUMP_PAGE']);

        /* 验证数据 */
        $validate_data = [
            'page_size'      => $page_size,
            'jump_page'      => $jump_page,
        ];

        //验证结果
        $result   = $this->activity_validate->scene('index')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->activity_validate->getError()]);
        }

        //获取数据
        $active = $this->activity_model->where('status=1')
            -> order('apply_time desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        /* 返回客户端数据 */
        return json(['code'=> '200', 'message' => '获取活动列表成功', 'data' => $active]);
    }

    /**
     * 沙龙活动介绍json数据
     */
    public function detail()
    {
        /* 获取客户端提交过来的参数 */
        $id = request()->param('id');
        // 检查token是否有效 获取当前用户id
        $user_id = NULL;
        $client_token = request()->header('access_token');
        if ( $this ->check_token($client_token) ){
            $user_id = session('user.id');
        }

        /* 验证数据 */
        $validate_data = [
            'id'        => $id,
        ];

        //验证结果
        $result   = $this->activity_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->activity_validate->getError()]);
        }

        //获取该活动消息
        $active_info = $this->activity_model->where('id', '=', $id)->find();

        $active_info['register'] = intval($active_info['start']) + intval($active_info['register']);
        $active_info['limit'] = intval($active_info['limit']);

        if ( empty($active_info) || $active_info['status'] == 0 ){
            return json(['code' => '401', 'message' => '活动不存在']);
        }

        $active_info['register'] = intval($active_info['start']) + intval($active_info['register']);
        $active_info['limit'] = intval($active_info['limit']);

        //整理活动状态
        $now_time = date('Y-m-d h:i:s', time());
        $active_status = 4; //正在报名中，默认值

        if ( $active_info['apply_time'] < $now_time ){
            $active_status = 1; //活动已经结束，超过了活动时间
        }elseif ( $active_info['begin_time'] > $now_time ){
            $active_status = 2; //活动尚未开始报名
        }elseif ( $active_info['end_time'] < $now_time ){
            $active_status = 3; //报名已经结束
        }else{
            if ( $active_info['limit'] != 0 ){
                if ( $active_info['limit'] <= $active_info['register'] ){
                    $active_status = 5; //报名人数已满
                }
            }
        }

        //用户报名状态
        if (empty($user_id) ){
            $user_status = 1; //用户未登录
        }else{
            $user_active = $this->user_activity_model->where('user_id', '=', $user_id)
                ->where('activity_id', '=', $id)
                ->find();

            if (empty($user_active) ){
                $user_status = 2; //用户未报名
            }else{
                if ($user_active['status'] == 1 ){
                    $user_status = 3; //用户已经报名，已审核
                }else{
                    $user_status = 4; //用户已经报名，未审核
                }
            }
        }

        //修改活动相关状态数据
        $active_info['status'] = $active_status;
        $active_info['user_status'] = $user_status;

        return json([
            'code'    => '200',
            'message' => '获取活动介绍成功',
            'data'    => $active_info,
        ]);
    }

    /**
     * 沙龙活动报名
     */
    public function apply() {
        /* 获取客户端提交过来的用户信息 */
        $activity_id  = request()->param('id');
        $username   = request()->param('username');
        $mobile     = request()->param('mobile');
        $email      = request()->param('email');
        $industry     = request()->param('industry');
        $occupation = request()->param('occupation');
        $company    = request()->param('company');

        /* 验证数据 */
        $validate_data = [
            'activity_id'=> $activity_id,
            'username'   => $username,
            'mobile'     => $mobile,
            'email'      => $email,
            'industry'   => $industry,
            'occupation' => $occupation,
            'company'    => $company,
        ];

        //验证结果
        $result   = $this->activity_validate->scene('apply')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->activity_validate->getError()]);
        }

        //判断用户是否已经登陆
        $client_token = request()->header('access_token');
        if (Session::has('access_token')){
            // 获取服务端存储的token
            $server_token = Session::get('access_token');
            if ($server_token != $client_token) {
                return json(['code' => '302', 'message' => '请先登录']);
            }
        }

        // 判断用户是否已报名
        $user_id = session('user.id');
        $active_result  = $this->user_activity_model->where(['user_id' => $user_id, 'activity_id' => $activity_id])->find();
        if ($active_result) {
            return json(['code' => '400', 'message' => '您已报名该活动,无需重复提交']);
        }

        //获取活动消息
        $active_info = $this->activity_model->where(['id' => $activity_id])->find();

        //整理活动状态
        $now_time = date('Y-m-d h:i:s', time());

        if ($active_info['start'] > $active_info['limit']) {
            return json([
                'code'      => '405',
                'message'   => '起始人数大于限制人数'
            ]);
        }

        if ( $active_info['limit'] != 0 ){
            if ( $active_info['limit'] <= $active_info['register'] ){
                return json(['code' => '400', 'message' => '报名人数已满']);
            }
        }

        if ( $active_info['apply_time'] < $now_time ){
            return json(['code' => '400', 'message' => '活动已结束']);
        }elseif ( $active_info['begin_time'] > $now_time ){
            return json(['code' => '400', 'message' => '活动报名未开始']);
        }elseif ( $active_info['end_time'] < $now_time ){
            return json(['code' => '400', 'message' => '活动报名已截止']);
        }

        //判断直接审核或者等待审核
        if ( $active_info['audit_method'] == 1 ){
            $user_active_status = 1;
        }else{
            $user_active_status = 0;
        }

        $data = ['user_id' => $user_id, 'activity_id' => $activity_id, 'register_time' => date("Y-m-d H:i:s", time()), 'status' => $user_active_status];
        $data = array_merge($data, $validate_data);

        //返回数据
        $result = $this->user_activity_model->insert($data);
        if ($result) {
            // 活动人数+1
            $this->activity_model->where(['id' => $activity_id])->setInc('register');
            return json(['code' => '200', 'message' => '提交成功']);
        } else {
            return json(['code' => '404', 'message' => '报名失败']);
        }
    }
}
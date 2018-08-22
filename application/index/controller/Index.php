<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/22
 * Time: 14:40
 * Comment: 首页控制器
 */
namespace app\index\controller;

use app\index\model\Dynamic as DynamicModel;
use app\index\model\Carousel as CarouselModel;
use app\index\model\Activity as ActivityModel;
use app\index\model\User as UserModel;

use think\Request;

class Index extends BasicController {

    /**
     * 声明动态模型
     * @var
     */
    protected $dynamic_model;

    /**
     * 声明轮播模型
     * @var
     */
    protected $carousel_model;

    /**
     * 声明活动模型
     * @var
     */
    protected $activity_model;

    /**
     * 声明成员模型
     * @var
     */
    protected $user_model;

    /**
     * 默认的构造函数
     * Index constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->dynamic_model = new DynamicModel();
        $this->carousel_model = new CarouselModel();
        $this->activity_model = new ActivityModel();
        $this->user_model = new UserModel();
    }

    /**
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index() {

        //轮播数据
        $carousel = $this->carousel_model
            ->where('status = 1')
            ->order('id', 'desc')
            ->field('id,url,picture')
            ->limit(4)
            ->select();

        //动态左侧数据
        $dynamic_left = $this->dynamic_model
            ->where('recommend = 1')
            ->where('status = 1')
            ->order('create_time', 'desc')
            ->limit(3)
            ->select();

        //获得记录数
        $count = $this->dynamic_model->count();

        //动态右侧数据
        if ($count<=3) {
            $dynamic_right = $this->dynamic_model
                ->order('create_time','desc')
                ->order('id', 'desc')
                ->limit($count)
                ->select();
        } else {
            $dynamic_right = $this->dynamic_model
                ->order('create_time','desc')
                ->order('id', 'desc')
                ->limit('0', $count-3)
                ->select();
        }

        //活动数据
        $activity = $this->activity_model
            ->where('status = 1')
            ->order('recommend', 'desc')
            ->order('id', 'desc')
            ->limit(6)
            ->select();

        foreach ( $activity as $key =>$value) {
            //整理活动状态
            $now_time = date('Y-m-d h:i:s', time());
            $activity[$key]['status'] = 2; //正在报名中，默认值

            if ( $value['apply_time'] < $now_time ){
                $activity[$key]['status'] = 4; //活动已经结束，超过了活动时间
            }elseif ( $value['begin_time'] > $now_time ){
                $activity[$key]['status'] = 1; //活动尚未开始报名
            }elseif ( $value['end_time'] < $now_time ){
                $activity[$key]['status'] = 3; //报名已经结束
            }
        }

        //企业数据
        $company = $this->user_model
            ->where('status = 1')
            ->where('auditor = 1')
            ->order('id', 'desc')
            ->field('id,company,logo')
            ->select();

        //封装数据
        $data = array_merge(['carousel' => $carousel, 'dynamic_left' => $dynamic_left, 'dynamic_right' => $dynamic_right, 'activity' => $activity, 'company' => $company]);

        return json([
            'code'      => '200',
            'message'   => '获取数据成功',
            'data'      => $data
        ]);
    }

}

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
     * 声明动态分页器
     * @var
     */
    protected $dynamic_page;

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
        $this->dynamic_page = config('pagination');
        $this->user_model = new UserModel();
    }

    /**
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index() {

        //接收客户端提交过来的数据
        $column_id = request()->param('column_id');
        $page_size = request()->param('page_size', $this->dynamic_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->dynamic_page['JUMP_PAGE']);

        //轮播数据
        $carousel = $this->carousel_model
            ->where('status = 1')
            ->order('id', 'desc')
            ->field('id,url,picture')
            ->limit(4)
            ->select();

        //筛选条件
        $condition['td.column_id'] = $column_id;

        //动态左侧数据
        $dynamic_left = $this->dynamic_model->alias('td')
            ->where('td.status = 1')
            ->join('tb_column tc', 'td.column_id = tc.id')
            ->order('td.recommend', 'desc')
            ->order('td.id', 'desc')
            ->field('td.id, td.title, td.picture, td.description, td.create_time, tc.name, tc.id as column_id')
            ->limit(3)
            ->select();


        //获取已经展示过的新闻内容
        foreach ($dynamic_left as $item) {
            $dynamic_left_list[] = $item['id'];
        }
        //获得记录数
        $count = $this->dynamic_model->count();


        $dynamic_right = $this->dynamic_model->alias('td')
            ->where('td.status = 1')
            ->where('td.id', 'not in', $dynamic_left_list)
            ->order('td.recommend', 'desc')
            ->order('td.id', 'desc')
            ->join('tb_column tc', 'td.column_id = tc.id')
            ->limit(15)
            ->field('td.id,td.title,tc.name,tc.id as column_id')
            ->select();

        //动态右侧数据
//        if ($count<=3) {
//            $dynamic_right = $this->dynamic_model->alias('td')
//                ->order('td.id', 'desc')
//                ->join('tb_column tc', 'td.column_id = tc.id')
//                ->limit($count)
//                ->field('td.id,td.title,tc.name,tc.id as column_id')
//                ->select();
//        } else {
//            $dynamic_right = $this->dynamic_model->alias('td')
//                ->order('id', 'desc')
//                ->join('tb_column tc', 'td.column_id = tc.id')
//                ->limit('0', $count-3)
//                ->field('td.id, td.title,tc.name,tc.id as column_id')
//                ->select();
//        }

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
            -> alias('tu')
            ->where('tu.status = 1')
            ->where('tu.auditor = 2')
            ->order('tg.sort', 'desc')
            ->order('tu.id', 'desc')
            ->field('tu.id, tu.company, tu.logo')
            ->join('tb_user_group tug', 'tug.user_id = tu.id')
            ->join('tb_group tg', 'tg.id = tug.group_id')
            ->select();

        //封装数据
        $data = array_merge(['carousel' => $carousel, 'dynamic_left' => $dynamic_left, 'dynamic_right' => $dynamic_right, 'activity' => $activity, 'company' => $company]);

        //筛选类目
        if (is_null($column_id)) {
            return json([
                'code'      => '200',
                'message'   => '获取数据成功',
                'data'      => $data
            ]);
        } else {
            $dynamic = $this->dynamic_model
                ->where('column_id', $column_id)
                ->paginate($page_size, false, ['page' => $jump_page]);
            return json([
                'code'      => '200',
                'message'   => '获取数据成功',
                'data'      => $dynamic
            ]);
        }
    }
}

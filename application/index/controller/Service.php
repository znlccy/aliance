<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 18:26
 * Comment: 服务资源控制器
 */

namespace app\index\controller;

use app\index\model\Service as ServiceModel;
use app\index\validate\Service as ServiceValidate;
use app\index\model\Category as CategoryModel;
use think\Request;

class Service extends BasicController {

    /**
     * 声明服务模型
     * @var
     */
    protected $service_model;

    /**
     * 声明服务栏目模型
     * @var
     */
    protected $category_model;

    /**
     * 声明服务验证器
     * @var
     */
    protected $service_validate;

    /**
     * 声明服务分页
     * @var
     */
    protected $service_page;

    /**
     * 默认构造函数
     * Service constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->service_model = new ServiceModel();
        $this->category_model = new CategoryModel();
        $this->service_validate = new ServiceValidate();
        $this->service_page = config('pagination');
    }
    
    /**
     * 服务资源api接口
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index() {

        /* 获取客户端提交的数据 */
        $page_size = request()->param('page_size', $this->service_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->service_page['JUMP_PAGE']);
        $category_id = request()->param('category_id');

        /* 验证数据 */
        $validate_data = [
            'page_size'         => $page_size,
            'jump_page'         => $jump_page,
            'category_id'       => $category_id,
        ];

        //验证结果
        $result   = $this->service_validate->scene('index')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->service_validate->getError()]);
        }

        //整理查询
        $where = [];
        if (!empty($category_id) ){
            $where = [
                'category_id' => $category_id,
            ];
        }

        //实例化模型
        $service = $this->service_model->order('id', 'desc')
            ->where($where)
            ->paginate($page_size, false, ['page' => $jump_page]);

        /* 查询分类 */
        $category = $this->category_model->order('id','asc')->select();

        /* 拼装数据 */
        $data = array_merge(['service' => $service, 'category' => $category]);

        /* 返回数据 */
        return json([
            'code'      => '200',
            'message'   => '获取服务列表成功',
            'data'      => $data
        ]);
    }

    /**
     * 创业服务资源详情界面
     */
    public function detail() {
        /* 获取客户端提交过来的数据 */
        $id = request()->param('id');

        /* 验证数据 */
        $validate_data = [
            'id'        => $id,
        ];

        //实例化验证器
        $result   = $this->service_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->service_validate->getError()]);
        }

        /* 推荐服务 */
        $recommend = $this->service_model->where('status', '=', '1')
            ->where('id','<>', $id)
            ->order('recommend','desc')
            ->order('id','desc')
            ->limit(3)
            ->select();

        /* 从数据库中查询对应的服务详情 */
        $service_info = $this->service_model->where('id', '=', $id)->find();

        /* 拼装数据 */
        $data = array_merge(['recommend' => $recommend, 'service_info' => $service_info]);

        /* 返回数据 */
        return json([
            'code'      => '200',
            'message'   => '查询成功',
            'data'      => $data
        ]);
    }
}
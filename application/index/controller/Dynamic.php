<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 18:26
 * Comment: 动态控制器
 */

namespace app\index\controller;

use app\index\model\Dynamic as DynamicModel;
use app\index\validate\Dynamic as DynamicValidate;
use think\Controller;
use think\Request;

class Dynamic extends Controller {

    /**
     * 声明动态模型
     * @var
     */
    protected $dynamic_model;

    /**
     * 声明动态验证器
     * @var
     */
    protected $dynamic_validate;

    /**
     * 声明动态分页器
     * @var
     */
    protected $dynamic_page;

    /**
     * 默认构造函数
     * Dynamic constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->dynamic_model = new DynamicModel();
        $this->dynamic_validate = new DynamicValidate();
        $this->dynamic_page = config('pagination');
    }

    /**
     * 动态api接口
     */
    public function index() {

        /* 获取客户端提交过来的数据 */
        $page_size = request()->param('page_size', $this->dynamic_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->dynamic_page['JUMP_PAGE']);

        /* 验证规则 */
        $validate_data = [
            'page_size'         => $page_size,
            'jump_page'         => $jump_page,
        ];

        //实例化验证器
        $result   = $this->dynamic_validate->scene('index')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->dynamic_validate->getError()]);
        }

        //实例化模型
        $review = $this->dynamic_model->order('id', 'desc')
            ->field('rich_text, recommend', true)
            ->paginate($page_size, false, ['page' => $jump_page]);

        /* 返回数据 */
        return json([
            'code'      => '200',
            'message'   => '查询动态成功',
            'data'      => $review
        ]);
    }

    /**
     * 论坛回顾api接口
     */
    public function detail() {

        /* 获取客户端提交的数据 */
        $id = request()->param('id');

        /* 验证规则 */
        $validate_data = [
            'id' => $id,
        ];

        //验证结果
        $result   = $this->dynamic_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->dynamic_validate->getError()]);
        }

        //返回数据
        $return_dynamic = $this->dynamic_model->field('recommend',true)
            ->where('id', '=', $id)
            ->find();

        if ( empty($return_dynamic) ){
            return json(['code' => '401', 'message' => 'ID不存在' ]);
        }

        /* 上一页数据 */
        $prev = $this->dynamic_model
            ->field('rich_text,recommend',true)
            ->where('id', '<', $id)
            ->order('id desc')
            ->find();

        /* 下一页数据 */
        $next = $this->dynamic_model
            ->field('rich_text,recommend',true)
            ->where('id', '>', $id)
            ->order('id asc')
            ->find();

        /* 最新论坛回顾 */
        $last_dynamic = $this->dynamic_model
            ->field('rich_text,recommend',true)
            ->where('id', '<>', $id)
            ->order('recommend', 'desc')
            ->order('id', 'desc')
            ->limit(3)
            ->select();

        $data = array_merge(['prev' => $prev], ['next' => $next], ['detail' => $return_dynamic], ['last_dynamic' => $last_dynamic]);

        return json([
            'code'      => '200',
            'message'   => '获取信息成功',
            'data'      => $data
        ]);
    }
}
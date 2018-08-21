<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/16
 * Time: 10:45
 * Comment: 分类控制器
 */

namespace app\admin\controller;

use app\admin\model\Category as CategoryModel;
use app\admin\validate\Category as CategoryValidate;
use think\Request;

class Category extends BasisController {

    /**
     * 分类模型
     * @var
     */
    protected $category_model;

    /**
     * 分类验证器
     * @var
     */
    protected $category_validate;

    /**
     * 分类分页器
     * @var
     */
    protected $category_page;

    /**
     * 默认构造函数
     * Category constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->category_model = new CategoryModel();
        $this->category_validate = new CategoryValidate();
        $this->category_page = config('pagination');
    }

    /**
     * 显示服务分类列表
     * @return \think\response\Json
     * @throws \think\exception\DbException
     */
    public function entry()
    {
        //接收客户端提交过来的数据
        $id = request()->param('id');
        $name = request()->param('name');
        $status = request()->param('status');
        $create_start = request()->param('create_start');
        $create_end = request()->param('create_end');
        $update_start = request()->param('update_start');
        $update_end = request()->param('update_end');
        $page_size = request()->param('page_size', $this->category_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->category_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'status'        => $status,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->category_validate->scene('entry')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->category_validate->getError()
            ]);
        }

        //筛选条件
        $conditions = [];

        if ($id) {
            $conditions['id'] = $id;
        }
        if ($name) {
            $conditions['name'] = ['like', '%' . $name . '%'];
        }
        if ($status || $status === 0) {
            $conditions['status'] = $status;
        }
        if ($create_start && $create_end) {
            $conditions['create_time'] = ['between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions['update_time'] = ['between time', [$update_start, $update_end]];
        }

        //返回数据
        $category = $this->category_model->where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        return json([
            'code'    => '200',
            'message' => '获取类目列表成功',
            'data'    => $category,
        ]);
    }

    /**
     * 类目添加更新api接口
     * @return \think\Response
     */
    public function save()
    {
        /* 获取前端提交的数据 */
        $id   = request()->param('id');
        $name = request()->param('name');
        $status = request()->param('status');

        /* 验证 */
        $validate_data = [
            'id'        => $id,
            'name'      => $name,
            'status'    => $status
        ];

        //验证结果
        $result = $this->category_validate->scene('save')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->category_validate->getError()]);
        }

        if (empty($id)) {
            $category = new CategoryModel;
            $result   = $category->save($validate_data);
        } else {
            $category = new CategoryModel;
            $result   = $category->save($validate_data, ['id' => $id]);
        }

        //返回结果
        if ($result) {
            $data = ['code' => '200', 'message' => '保存成功!'];
            return json($data);
        } else {
            $data = ['code' => '404', 'message' => '保存失败!'];
            return json($data);
        }
    }

    /**
     * 类目详情api接口
     */
    public function detail(){
        //获取客户端提交的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->category_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->category_validate->getError()
            ]);
        }

        //返回数据
        $service = $this->category_model->where('id', $id)->find();
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
     * 类目删除api接口
     */
    public function delete() {

        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->category_validate->scene('delete')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->category_validate->getError()
            ]);
        }

        //返回结果
        $delete = $this->category_model->where('id', $id)->delete();
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
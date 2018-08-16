<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 14:33
 * Comment: 成员分组控制器
 */

namespace app\admin\controller;
use app\admin\validate\Group as GroupValidate;
use app\admin\model\Group as GroupModel;
use think\Request;

class Group extends BasisController {

    /**
     * 声明分组模型变量
     * @var
     */
    protected $group_model;

    /**
     * 声明分组验证器变量
     * @var
     */
    protected $group_validate;

    /**
     * 声明分组分页变量
     * @var
     */
    protected $group_page;

    /**
     * 构造函数
     * Group constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null)
    {
        $this->group_model = new GroupModel();
        $this->group_validate = new GroupValidate();
        $this->group_page = config('pagination');
    }

    /**
     * 分组列表api接口
     */
    public function entry() {

        //获取客户端提交过来的数据
        $id = request()->param('id');
        $name = request()->param('name');
        $sort = request()->param('sort');
        $create_start = request()->param('create_start');
        $create_end = request()->param('create_end');
        $page_size = request()->param('page_size', $this->group_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->group_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'sort'          => $sort,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->group_validate->scene('entry')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->group_validate->getError()
            ]);
        }

        //筛选条件
        $conditions = [];
        if ($id) {
            $conditions['id'] = $id;
        }
        if ($name) {
            $conditions['name'] = ['like', '%' .$name . '%'];
        }
        if ($sort) {
            $conditions['sort'] = $sort;
        }
        if ($create_start && $create_end) {
            $conditions['create_time'] = ['between time', [$create_start, $create_end]];
        }

        //返回结果
        $group_entry = $this->group_model->where($conditions)
            ->order('sort', 'desc')
            ->order('id', 'asc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        if ($group_entry) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $group_entry
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败'
            ]);
        }
    }

    /**
     * 分组添加更新api接口
     */
    public function save() {

        //接收客户提交过来的数据
        $id = request()->param('id');
        $name = request()->param('name');
        $sort = request()->param('sort');

        //验证数据
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'sort'          => $sort
        ];

        //验证结果
        $result = $this->group_validate->scene('save')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->group_validate->getError()
            ]);
        }

        //保存还是添加
        if (empty($id)) {
            $this->group_model->save($validate_data);
            return json([
                'code'      => '200',
                'message'   => '添加成功'
            ]);
        } else {
            $this->group_model->save($validate_data, ['id' => $id]);
            return json([
                'code'      => '201',
                'message'   => '更新成功'
            ]);
        }

    }

    /**
     * 分组详情api接口
     */
    public function detail() {

        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->group_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->group_validate->getError()
            ]);
        }

        //返回数据
        $group = $this->group_model->where(['id' => $id])->find();
        //判断数据是否为空
        if ($group) {
            return json([
                'code'      => '200',
                'message'   => '查询数据成功',
                'data'      => $group
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '查询数据失败,数据不存在'
            ]);
        }
    }

    /**
     * 删除分组api接口
     */
    public function delete() {

        //获取客户端提交的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->group_validate->scene('delete')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->group_validate->getError()
            ]);
        }

        //删除数据
        $delete = $this->group_model->where(['id' => $id])->delete();
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
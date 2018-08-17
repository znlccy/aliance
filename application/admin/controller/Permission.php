<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 12:03
 * Comment: 权限控制器
 */
namespace app\admin\controller;

class Permission extends BasisController {

    public function entry() {
        /* 获取客户端提供的数据 */
        $id = request()->param('id');
        $status = request()->param('status');
        $name = request()->param('name');
        $path = request()->param('path');
        $pid = request()->param('pid');
        $description = request()->param('description');
        $sort = request()->param('sort');
        $level = request()->param('level');
        $create_start = request()->param('create_start');
        $create_end = request()->param('create_end');
        $update_start = request()->param('update_start');
        $update_end = request()->param('update_end');
        $page_size = request()->param('page_size', $this->role_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->role_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'             => $id,
            'status'         => $status,
            'name'           => $name,
            'path'           => $path,
            'pid'            => $pid,
            'description'    => $description,
            'sort'           => $sort,
            'level'          => $level,
            'create_start'   => $create_start,
            'create_end'     => $create_end,
            'update_start'   => $update_start,
            'update_end'     => $update_end,
            'page_size'      => $page_size,
            'jump_page'      => $jump_page,
        ];

        //验证结果
        $result   = $this->role_validate->scene('entry')->check($validate_data);
        if (!$result) {
            return json(['code' => '401', 'message' => $this->role_validate->getError()]);
        }

        //筛选条件
        $conditions = [];

        if ($id) {
            $conditions['id'] = $id;
        }
        if ($status || $status === 0) {
            $conditions['status'] = $status;
        }
        if ($name) {
            $conditions['name'] = ['like', '%' . $name . '%'];
        }
        if ($name) {
            $conditions['path'] = ['like', '%' . $path . '%'];
        }
        if ($pid) {
            $conditions['pid'] = $pid;
        }
        if ($description) {
            $conditions['description'] = ['like', '%' . $description . '%'];
        }
        if ($sort || $sort === 0) {
            $conditions['sort'] = $sort;
        }
        if ($level) {
            $conditions['level'] = $level;
        }
        if ($create_start || $create_end) {
            $conditions['create_time'] = ['between time', [$create_start, $create_end]];
        }
        if ($update_start || $update_end) {
            $conditions['update_time'] = ['between time', [$update_start, $update_end]];
        }

        //返回数据
        $role = $this->role_model->where($conditions)
            ->paginate($page_size, false, ['page' => $jump_page]);

        return json([
            'code'      => '200',
            'message'   => '获取角色名称成功',
            'data'      => $role
        ]);
    }
}
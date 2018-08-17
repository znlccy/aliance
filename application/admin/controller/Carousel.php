<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 13:36
 * Comment: 轮播控制器
 */

namespace app\admin\controller;

use app\admin\model\Carousel as CarouselModel;
use app\admin\validate\Carousel as CarouselValidate;
use think\Request;

class Carousel extends BasisController {

    /**
     * 声明轮播模型
     * @var
     */
    protected $carousel_model;

    /**
     * 声明轮播验证器
     * @var
     */
    protected $carousel_validate;

    /**
     * 声明轮播分页器
     * @var
     */
    protected $carousel_page;

    /**
     * 声明默认的构造函数
     * Carousel constructor.
     * @param Request|null $request
     */
    public function __construct(Request $request = null) {
        parent::__construct($request);
        $this->carousel_model = new CarouselModel();
        $this->carousel_validate = new CarouselValidate();
        $this->carousel_page = config('pagination');
    }

    /**
     * 轮播列表api接口
     * @return \think\response\Json
     * @throws \think\exception\DbException
     */
    public function entry() {
        //获取客户端提交过来的数据
        $id = request()->param('id');
        $title = request()->param('title');
        $sort = request()->param('sort');
        $create_start = request()->param('create_start');
        $create_end = request()->param('create_end');
        $update_start = request()->param('update_start');
        $update_end = request()->param('update_end');
        $publish_start = request()->param('publish_start');
        $publish_end = request()->param('publish_end');
        $status = request()->param('status');
        $page_size = request()->param('page_size', $this->carousel_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->carousel_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'sort'          => $sort,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'publish_start' => $publish_start,
            'publish_end'   => $publish_end,
            'status'        => $status,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page
        ];

        //验证结果
        $result = $this->carousel_validate->scene('entry')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->carousel_validate->getError()
            ]);
        }

        //条件筛选
        $conditions = [];

        if ($id) {
            $conditions['id'] = $id;
        }
        if ($title) {
            $conditions['title'] = ['like', '%' . $title . '%'];
        }
        if ($sort || $sort === 0) {
            $conditions['sort'] = $sort;
        }
        if ($create_start && $create_end) {
            $conditions['create_time'] = ['between time', [$create_start, $create_end]];
        }
        if ($update_start && $update_end) {
            $conditions['update_time'] = ['between time', [$update_start, $update_end]];
        }
        if ($publish_start && $publish_end) {
            $conditions['publish_time'] = ['between time', [$publish_start, $publish_end]];
        }
        if ($status || $status === 0) {
            $conditions['status'] = $status;
        }

        //返回数据
        $carousel = $this->carousel_model->where($conditions)
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page]);

        return json([
            'code'      => '200',
            'message'   => '获取动态列表成功',
            'data'      => $carousel
        ]);
    }

    /**
     * 轮播添加更新接口
     * @return \think\response\Json
     */
    public function save() {
        /* 获取前端提交的数据 */
        $id           = request()->param('id');
        $title        = request()->param('title');
        $url          = request()->param('url');
        $picture      = request()->file('picture');
        $sort         = request()->param('sort');
        $publish_time = date('Y-m-d H:i:s', time());
        $status       = request()->param('status', 0);

        // 移动图片到框架应用根目录/public/images
        if ($picture) {
            $info = $picture->move(ROOT_PATH . 'public' . DS . 'images');
            if ($info) {
                //成功上传后，获取上传信息
                //输出文件保存路径
                $sub_path = str_replace('\\', '/', $info->getSaveName());
                $picture  = '/images/' . $sub_path;
            }
        }

        //验证数据
        $validate_data = [
            'id'            => $id,
            'title'         => $title,
            'url'           => $url,
            'picture'       => $picture,
            'sort'          => $sort,
            'publish_time'  => $publish_time,
            'status'        => $status
        ];

        //验证结果
        $result = $this->carousel_validate->scene('save')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->carousel_validate->getError()
            ]);
        }
        if (empty($id)) {
            $result  = $this->carousel_model->save($validate_data);
        } else {
            if (empty($picture)) {
                unset($validate_data['picture']);
            }
            $result  = $this->carousel_model->save($validate_data, ['id' => $id]);
        }
        if ($result) {
            $data = ['code' => '200', 'message' => '保存成功!'];
            return json($data);
        } else {
            $data = ['code' => '404', 'message' => '保存失败'];
            return json($data);
        }
    }

    /**
     * 轮播详情api接口
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function detail() {
        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->carousel_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->carousel_validate->getError()
            ]);
        }

        //返回数据
        $column = $this->carousel_model->where('id', $id)->find();
        if ($column) {
            return json([
                'code'      => '200',
                'message'   => '获取信息成功',
                'data'      => $column
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '获取信息失败'
            ]);
        }
    }

    /**
     * 轮播删除api接口
     * @return \think\response\Json
     */
    public function delete() {
        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'        => $id
        ];

        //验证结果
        $result = $this->carousel_validate->scene('delete')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->carousel_validate->getError()
            ]);
        }

        //返回结果
        $manual_result = $this->carousel_model->where('id', $id)->delete();
        if ($manual_result) {
            return json([
                'code'      => '200',
                'message'   => '删除数据成功'
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '删除数据失败，数据不存在'
            ]);
        }
    }
}
<?php

namespace app\admin\controller;

use app\index\controller\BasicController;
use think\Controller;
use think\Request;
use app\admin\model\Service as ServiceModel;
use app\admin\validate\Service as ServiceValidate;
use app\admin\model\Category as CategoryModel;
/**
 * @title 服务资源管理
 */
class Service extends BasicController {

    /**
     * 声明服务模型
     * @var
     */
    protected $service_model;

    /**
     * 声明分类模型
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
     * @title 获取文章列表
     * @desc  {"0":"接口地址：http://open.opqnext.com/index.php?c=article&a=index","1":"请求方式：GET","2":"接口备注：必须传入keys值用于通过加密验证"}
     * @param {"name":"page","type":"int","required":true,"default":"1","desc":"页数"}
     * @param {"name":"keys","type":"string","required":true,"default":"xxx","desc":"加密字符串,substr(md5(\"约定秘钥\".$page),8,16)"}
     * @param {"name":"word","type":"string","required":false,"default":"null","desc":"搜索关键字"}
     * @param {"name":"cate","type":"int","required":false,"default":0,"desc":"分类ID,不传表示所有分类"}
     * @param {"name":"size","type":"int","required":false,"default":5,"desc":"每页显示条数，默认为5"}
     * @return {"name":"status","type":"int","required":true,"desc":"返回码：1成功,0失败","level":1}
     * @return {"name":"message","type":"string","required":true,"desc":"返回信息","level":1}
     * @return {"name":"data","type":"array","required":true,"desc":"返回数据","level":1}
     * @return {"name":"id","type":"string","required":true,"desc":"文章ID(22位字符串)","level":2}
     * @return {"name":"title","type":"string","required":true,"desc":"文章标题","level":2}
     * @return {"name":"thumb","type":"string","required":true,"desc":"文章列表图","level":2}
     * @return {"name":"content","type":"text","required":true,"desc":"文章内容","level":2}
     * @return {"name":"cate","type":"int","required":true,"desc":"文章分类","level":2}
     * @return {"name":"tags","type":"array","required":true,"desc":"文章标签","level":2}
     * @return {"name":"id","type":"string","required":true,"desc":"标签ID","level":3}
     * @return {"name":"tag","type":"string","required":true,"desc":"标签名称","level":3}
     * @return {"name":"count","type":"int","required":true,"desc":"标签使用数","level":3}
     * @return {"name":"img","type":"array","required":true,"desc":"文章组图","level":2}
     */
    public function entry() {

        //获取客户端提交过来的数据
        $id = request()->param('id');
        $name = request()->param('name');
        $description = request()->param('description');
        $category_id = request()->param('category_id');
        $price_start = request()->param('price_start');
        $price_end = request()->param('price_end');
        $recommend = request()->param('recommend');
        $status = request()->param('status');
        $address = request()->param('address');
        $create_start = request()->param('create_start');
        $create_end = request()->param('create_end');
        $update_start = request()->param('update_start');
        $update_end = request()->param('update_end');
        $publish_start = request()->param('publish_start');
        $publish_end = request()->param('publish_end');
        $page_size = request()->param('page_size', $this->service_page['PAGE_SIZE']);
        $jump_page = request()->param('jump_page', $this->service_page['JUMP_PAGE']);

        //验证数据
        $validate_data = [
            'id'            => $id,
            'name'          => $name,
            'description'   => $description,
            'category_id'   => $category_id,
            'price_start'   => $price_start,
            'price_end'     => $price_end,
            'recommend'     => $recommend,
            'status'        => $status,
            'address'       => $address,
            'create_start'  => $create_start,
            'create_end'    => $create_end,
            'update_start'  => $update_start,
            'update_end'    => $update_end,
            'publish_start' => $publish_start,
            'publish_end'   => $publish_end,
            'page_size'     => $page_size,
            'jump_page'     => $jump_page,
        ];

        //验证结果
        $result = $this->service_validate->scene('entry')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->service_validate->getError()
            ]);
        }

        //筛选条件
        $conditions = [];
        if ($id) {
            $conditions['id'] = $id;
        }
        if ($name) {
            $conditions['name'] = ['like', '%' . $name .'%'];
        }
        if ($description) {
            $conditions['description'] = ['like', '%' . $description .'%'];
        }
        if ($category_id) {
            $conditions['category_id'] = $category_id;
        }
        if ($price_start && $price_end) {
            $conditions['price'] = ['between',[$price_start, $price_end]];
        }
        if ($recommend) {
            $conditions['recommend'] = $recommend;
        }
        if ($status || $status === 0) {
            $conditions['status'] = $status;
        }
        if ($address) {
            $conditions['address'] = ['like', '%' . $address . '%'];
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

        //返回结果
        $service = $this->service_model->where($conditions)
            ->with(['category' => function ($query) {
                $query->withField("id, name");
            }])
            ->order('id', 'desc')
            ->paginate($page_size, false, ['page' => $jump_page])->each(function ($item, $key) {
                unset($item['category_id']);
                return $item;
            });
        return json([
            'code'      => '200',
            'message'   => '获取服务列表成功',
            'data'      => $service
        ]);

    }

    /**
     * @title 登录接口
     * @description 接口说明
     * @author 开发者
     * @url /api/demo
     * @method GET
     * @module 用户模块

     * @param name:name type:int require:1 default:1 other: desc:用户名
     * @param name:pass type:int require:1 default:1 other: desc:密码
     *
     * @return name:名称
     * @return mobile:手机号
     *
     */
    public function save() {

        /* 获取前端提交的数据 */
        $id           = request()->param('id');
        $name         = request()->param('name');
        $description  = request()->param('description');
        $picture      = request()->file('picture');
        $category_id  = request()->param('category_id');
        $price        = request()->param('price');
        $recommend    = request()->param('recommend', 0);
        $address      = request()->param('address');
        $publish_time = date('Y-m-d H:i:s', time());
        $status       = request()->param('status', 0);
        $rich_text    = request()->param('rich_text');

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
            'name'          => $name,
            'description'   => $description,
            'picture'       => $picture,
            'category_id'   => $category_id,
            'price'         => $price,
            'recommend'     => $recommend,
            'address'       => $address,
            'publish_time'  => $publish_time,
            'status'        => $status,
            'rich_text'     => $rich_text
        ];

        //验证结果
        $result = $this->service_validate->scene('save')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->service_validate->getError()
            ]);
        }
        if (empty($id)) {
            $result  = $this->service_model->save($validate_data);
        } else {
            if (empty($picture)) {
                unset($validate_data['picture']);
            }
            $result  = $this->service_model->save($validate_data, ['id' => $id]);
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
     * @title 获取服务资源详情
     * @description 服务资源详情
     * @author znlccy
     * @url /admin/service/detail
     * @method POST
     * @module 服务资源管理模块
     * @param name:id type:int require:1 default:1 other: desc:服务主键
     * @return name:status type:int
     * @return name:message type:string
     */
    public function detail() {
        //获取客户端提交的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->service_validate->scene('detail')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->service_validate->getError()
            ]);
        }

        //返回数据
        $service = $this->service_model->where('id', $id)->find();
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
     * 删除服务资源api接口
     */
    public function delete() {

        //获取客户端提交过来的数据
        $id = request()->param('id');

        //验证数据
        $validate_data = [
            'id'            => $id
        ];

        //验证结果
        $result = $this->service_validate->scene('delete')->check($validate_data);
        if (!$result) {
            return json([
                'code'      => '401',
                'message'   => $this->service_validate->getError()
            ]);
        }

        //返回结果
        $delete = $this->service_model->where('id', $id)->delete();
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

    /**
     * 服务资源下拉列表api接口
     */
    public function spinner() {
        //获取数据库数据
        $category = $this->category_model->where('status','1')->field('id, name')->select();

        //返回结果
        if ($category) {
            return json([
                'code'      => '200',
                'message'   => '获取列表成功',
                'data'      => $category
            ]);
        } else {
            return json([
                'code'      => '404',
                'message'   => '获取列表失败'
            ]);
        }
    }
}

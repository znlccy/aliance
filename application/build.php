<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [

    //生成后台
    'admin'    => [
        '__dir__'   => ['behavior', 'controller', 'model', 'validate', 'view'],
        'controller'=> ['Admin', 'Role', 'Permission'],
        'model'     => ['Admin', 'Role', 'Permission', 'AdminRole', 'RolePermission'],
        'validate'  => ['Admin', 'Role', 'Permission', 'AdminRole', 'RolePermission'],
        'view'      => ['index/index']
    ],

    //生成前台
    'index'     => [
        '__dir__'   => ['behavior', 'controller', 'model', 'validate', 'view'],
        'controller'=> ['Index', 'User'],
        'model'     => ['User'],
        'validate'  => ['User'],
        'view'      => ['index/index']
    ],

];

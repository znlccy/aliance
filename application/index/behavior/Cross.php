<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/15
 * Time: 13:34
 * Comment: 跨域访问问题
 */

namespace app\index\behavior;

use think\Request;

class Cross {

    /**
     * 响应发送
     * @param $params
     */
    public function responseSend()
    {    // 响应头设置 我们就是通过设置header来跨域的 这就主要代码了 定义行为只是为了前台每次请求都能走这段代码
        //$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';

        $request = Request::instance();
        //header('Access-Control-Allow-Origin:' . $origin);
        //header('Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS');
        //header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        //header('Access-Control-Allow-Credentials:true');
        //header('Content-Type:application/x-www-form-urlencoded; charset=UTF-8');

        header("Access-Control-Allow-Credentials:true");
        header("Access-Control-Allow-Origin:" . $request->domain());//");//注意修改这里填写你的前端的域名
        header("Access-Control-Max-Age:3600");
        header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Authorization,SessionToken");
        header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
        //设置头部前置刷新
        header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
    }
}
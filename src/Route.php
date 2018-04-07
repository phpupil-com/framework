<?php
/**
 * 核心路由
 * @copyright JungoPhpFramework 深圳俊网网络有限公司 http://www.junnet.net/
 * @author 吴跃忠 <357397264@qq.com>
 */

namespace PHPupil\Framework;


class Route
{


    /**
     * Route constructor.
     */
    public function __construct()
    {

    }


    /**
     * 初始化路由
     * @return void
     */
    public static function _init()
    {
        self::include_route_files();
    }


    /**
     * 加载全部路由文件处理
     * @return void
     */
    private static function include_route_files()
    {
        // 路由文件地址
        $route_path = PHPUPIL_PATH . 'route' . DS;
        $fd = opendir($route_path);
    }



}
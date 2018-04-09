<?php
/**
 * 核心路由
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */

namespace PHPupil\Framework;


use Swoole\Http\Request;

class Route
{

    // GET路由
    private static $get_routes = [];

    // POST路由
    private static $post_routes = [];
    private static $request_routes = [];
    private static $receive_routes = [];
    private static $all_routes = [];


    /**
     * Route constructor.
     */
    public function __construct()
    {

    }


    public function run($request)
    {
        if( isset($request->get['s']) ){

        }else{
            if( !empty(self::$get_routes['/']) ){
                $s = self::$get_routes['/'];
            }else if( !empty(self::$post_routes['/']) ){
                $s = self::$post_routes['/'];
            }else if( !empty(self::$request_routes['/']) ){
                $s = self::$request_routes['/'];
            }else if( !empty(self::$all_routes['/']) ){
                $s = self::$all_routes['/'];
            }else{
                $s = Config::get('default_module').'/'.Config::get('default_controller').'/'.Config::get('default_action');
            }
            if( $s instanceof \Closure){
                return call_user_func($s);
            }

        }
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
        while ( ($file = readdir($fd) ) !== false ){
            if( $file == '.' || $file == '..' ){
                continue;
            }
            require_once $route_path.DS.$file;
        }
        closedir($fd);
    }


    /**
     * 设置GET路由
     * @param $alias
     * @param $path
     * @return bool|void
     */
    public static function get($alias,$path)
    {
        // 保存路由
        self::$get_routes[$alias] = $path;
    }


    /**
     * 设置HTTP POST路由
     * @param $alias
     * @param $path
     * @return bool|void
     */
    public static function post($alias,$path)
    {

    }

    /**
     * 设置HTTP Request路由
     * @param $alias
     * @param $path
     * @return bool|void
     */
    public static function request($alias,$path)
    {

    }

    /**
     * 设置TCP Receive路由
     * @param $alias
     * @param $path
     * @return bool|void
     */
    public static function receive($alias,$path)
    {

    }

    /**
     * 设置全部路由
     * @param $alias
     * @param $path
     * @return bool|void
     */
    public static function all($alias,$path)
    {

    }


}
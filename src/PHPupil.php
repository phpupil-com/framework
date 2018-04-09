<?php
/**
 * PHPupil框架启动文件
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */
namespace PHPupil\Framework;

use PHPupil\Framework\Server\AbServer;
use PHPupil\Server\Http\HTTP;

class PHPupil
{

    /**
     * 所需最低PHP版本
     * @var string
     */
    private $php_version = '7.0.1';


    /**
     * 所需最低swoole版本
     * @var string
     */
    private $swoole_version = '2.0.1';


    /**
     * 服务
     * @var AbServer
     */
    private $server;


    /**
     * 服务器类型
     * @var string
     */
    private $type;

    const SERVER_TYPE_HTTP = 'HTTP';
    const SERVER_TYPE_TCP = 'Server\TCP';
    const SERVER_TYPE_UDP = 'Server\UPD';
    const SERVER_TYPE_WEBSOCKET = 'Server\WebSocket';

    /**
     * PHPupil constructor.
     */
    public function __construct()
    {
        require_once __DIR__ .'/Helper.php';
        // 设置文件分隔符
        defined('DS') or define('DS', DIRECTORY_SEPARATOR );
        // 检测当前PHP版本,防止PHP版本过低无法使用
        if( version_compare( PHP_VERSION, $this->php_version, '<') ){
            die("您当前的PHP版本过低,请选用 PHP v'.$this->php_version.' 及以上版本!".PHP_EOL);
        }
    }


    /**
     * 设置启动服务类型
     * @param string $server_type
     * @return void
     */
    protected function set_server_type( $server_type = self::SERVER_TYPE_HTTP )
    {
        if( $server_type != self::SERVER_TYPE_HTTP &&
            $server_type != self::SERVER_TYPE_TCP &&
            $server_type != self::SERVER_TYPE_UDP &&
            $server_type != self::SERVER_TYPE_WEBSOCKET
        ){
            die("请选择正确的服务类型".PHP_EOL);
        }
        $this->type = $server_type;
    }


    /**
     * 启动服务
     * @return mixed
     */
    public function run()
    {
        // 检测是否安装扩展
        if( !extension_loaded('swoole') ){
            die("请先安装Swoole扩展!".PHP_EOL);

        // 检测Swoole版本
        }elseif(  version_compare( SWOOLE_VERSION, $this->swoole_version,'<') ){
            die("当前Swoole版本过低,请升级!".PHP_EOL);
        }
        $this->server = new HTTP();

        $this->server->run();
    }


    /**
     * 配置服务配置
     * @param array $setting
     * @return mixed
     */
    public function setting($setting)
    {

    }


}
<?php
/**
 * 服务抽象库
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */
namespace PHPupil\Framework\Server;

abstract class AbServer
{

    /**
     * AbServer constructor.
     */
    public function __construct()
    {

        $this->_init();
    }


    /**
     * 初始配置
     * @return void
     */
    public function _init()
    {

    }


    /**
     * 启动服务
     * @return mixed
     */
    abstract function run();

}
<?php
/**
 * 数据库管理工具
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */
namespace PHPupil\Framework\Db;

class Db
{

    private $link;

    /**
     * Mysql constructor.
     * @param string $db
     */
    public function __construct($db = '')
    {
        $this->link = new \Swoole\Coroutine\Mysql();

        $this->link->connect([
            'host' => '127.0.0.1',
            'port' => 3306,
            'user' => 'root',
            'password' => 'root',
            'database' => 'test',
            'charset' => 'utf8',
        ]);
    }



    private function config($db = '')
    {

    }
}
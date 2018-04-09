<?php
/**
 * 协程MySql
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */
namespace PHPupil\Framework\Db;

class CoMysql extends AbDatabase
{

    private $link;

    /**
     * Mysql constructor.
     */
    public function __construct()
    {

    }


    /**
     * 连接数据库
     * @param $config
     */
    public function connect($config)
    {
        // TODO: Implement connect() method.
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


    public function insert()
    {
        // TODO: Implement insert() method.
    }


}
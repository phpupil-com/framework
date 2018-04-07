<?php
/**
 * 数据库操作抽象
 * @copyright JungoPhpFramework 深圳俊网网络有限公司 http://www.junnet.net/
 * @author 吴跃忠 <357397264@qq.com>
 */

namespace PHPupil\Framework\Db;


abstract class AbDatabase
{

    abstract public function connect($config);


    abstract public function insert();



}
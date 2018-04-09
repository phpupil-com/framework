<?php
/**
 * 数据库操作抽象
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */

namespace PHPupil\Framework\Db;


abstract class AbDatabase
{

    abstract public function connect($config);


    abstract public function insert();



}
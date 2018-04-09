<?php
/**
 * 视图
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */
namespace PHPupil\Framework\View\Template;

interface TempInit
{

    public function getTpl();

    public function includeTpl($file,$admin);

    public function setVariable($key,$value = '');

    public function getVariable($key);

}
<?php
/**
 * 模板
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */

namespace PHPupil\Framework\View\Template;

class PHPupil implements TempInit
{

    public $variable = [];

    public function __construct()
    {
    }


    /**
     * 获取模板
     * @param array $file 自定义文件地址
     * @return mixed
     */
    function getTpl($file = [])
    {
        $tpl = explode('/',$file);
        $module= $tpl[0];
        unset($tpl[0]);
        $templatePath = PHPUPIL_PATH .$module. DS .'views'. DS .implode('/',$tpl).'.php';
        include $templatePath;
    }


    /**
     * include
     * @param string $file
     * @param bool $admin 是否判断后台
     * @return mixed
     */
    function includeTpl($file,$admin = true)
    {
        $tpl = explode('/',$file);
        $module= $tpl[0];
        unset($tpl[0]);
        $templatePath = PHPUPIL_PATH .$module. DS .'views'. DS .implode('/',$tpl).'.php';
        include $templatePath;
    }


    function setVariable($key,$value = '')
    {
        if( is_array($key) ){
            foreach ($key as $key2=>$item){
                $this->variable[$key2] = $item;
            }
        }else{
            $this->variable[$key] = $value;
        }
    }


    function getVariable($key)
    {
        return $this->variable[$key];
    }

}
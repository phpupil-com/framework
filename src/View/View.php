<?php
/**
 * 视图
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */
namespace PHPupil\Framework\View;

use PHPupil\Framework\View\Template\PHPupil;
use PHPupil\Framework\View\Template\TempInit;

class View
{

    /**
     * 模板类
     * @var TempInit
     */
    static $tempHandle;


    /**
     * 显示模板内容
     * @param $file
     * @param $variable
     * @return mixed
     */
    public static function show($file = '',$variable = [])
    {
        foreach ( $variable as $key=>$item ){
            self::handle()->setVariable($key,$item);
        }
        if( empty($file) ){
            $showData = self::handle()->getTpl();
        }else{
            $showData = self::includeTpl($file);
        }

        return $showData;
    }


    /**
     * 返回错误页面模板
     * @param $error
     * @param $url
     * @return mixed
     */
    public static function error($error = '',$url = '')
    {
        self::handle()->setVariable('message',$error ?: '');
        self::handle()->setVariable('url',$url ?: '');
        self::includeTpl('common:404',false);
    }


    /**
     * 返回操作正确页面模板
     * @param $message
     * @param $url
     * @return mixed
     */
    public static function success($message = '',$url = '')
    {
        self::handle()->setVariable('message',$message ?: '');
        self::handle()->setVariable('url',$url ?: '');
        self::includeTpl('common:success',false);
    }

    public static function includeTpl($file,$admin = true)
    {
        return self::handle()->includeTpl($file,$admin);
    }


    /**
     * 设置变量
     * @param $variable
     * @return mixed
     */
    public static function setVariable($variable){
        foreach ( $variable as $key=>$item ){
            self::handle()->setVariable($key,$item);
        }
    }


    /**
     * 获取变量
     * @param $key
     * @return mixed
     */
    public static function getVariable($key){
        return self::handle()->getVariable($key);
    }


    /**
     * 获取模板
     * @return mixed
     */
    protected static function display()
    {

    }


    /**
     *
     * @return TempInit
     */
    protected static function handle()
    {
        if( empty(self::$tempHandle) ){
            self::$tempHandle = new PHPupil();
        }
        $tempHandle = clone self::$tempHandle;
        return self::$tempHandle;
    }


}
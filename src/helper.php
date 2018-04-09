<?php
/**
 * 函数库
 * @copyright PHPupil Framework http://www.phpupil.com/
 * @author 吴跃忠 <357397264@qq.com>
 */

if( !function_exists('dump') ){
    /**
     * 数据打印
     * @param $data
     * @return string
     */
    function dump($data){
        ob_start();
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        $ret = ob_get_clean();
        echo $ret;
    }
}


if( !function_exists('view') ){
    /**
     * 模板显示
     * @param $file
     * @return mixed
     */
    function view($file)
    {
        PHPupil\Framework\View\View::show($file);
    }
}
<?php
/**
 *
 * @copyright JungoPhpFramework 深圳俊网网络有限公司 http://www.junnet.net/
 * @author 吴跃忠 <357397264@qq.com>
 */

namespace PHPupil\Framework;


class Config
{

    /**
     * 所有配置
     * @var array
     */
    private static $configs = [];


    /**
     * 读取所有配置放入到$configs中
     * @return void
     */
    public static function init()
    {

    }


    /**
     * 获取系统配置
     * @param string $key
     * @return void|mixed
     */
    public static function get($key)
    {
        $value = '';
        if( strpos('.',$key) === false ){
            if( key_exists($key,self::$configs) ){
                $value = self::$configs[$key];
            }
        }else{
            $keys = explode('.',$key);
            $values = self::$configs;
            $i = 1;
            $count_key = count($keys);
            foreach ( $keys as $item ) {
                if( empty($item) || !key_exists($item,$values) ){
                    break;
                }
                $values = $values[$item];
                if( $i == $count_key ){
                    $value = $values;
                }
                $i++;
            }
        }
        return $value;
    }


    /**
     * 获取系统配置
     * @param string $key
     * @param mixed $value
     * @return void|mixed
     */
    public static function set($key,$value)
    {
        if( strpos('.',$key) === false ){
            self::$configs[$key] = $value;
        }else{
            $keys = explode('.',$key);
            $values = self::$configs;
            $i = 1;
            $count_key = count($keys);
            foreach ( $keys as $item ) {
                if( empty($item) ){
                    break;
                }
                $values = $values[$item];
                if( $i == $count_key ){
                    self::$configs[$key] = $value;
                }
                $i++;
            }
        }
    }

}
<?php

use ByteDance\Kernel\DataArray;

/**
 * Class Dy
 * @package ByteDance
 *
 * @method \ByteDance\Oauth Oauth($options = []) static 扫码授权
 * @method \ByteDance\Poi Poi($options = []) static 商铺接入
 * @method \ByteDance\User User($options = []) static 用户操作
 * @method \ByteDance\Video Video($options = []) static 视频操作
 * @method \ByteDance\Comment Comment($options = []) static 用户评论
 * @method \ByteDance\Toutiao Toutiao($options = []) static 头条操作
 * @method \ByteDance\Xigua Xigua($options = []) static 西瓜操作
 * @method \ByteDance\Tool Tool($options = []) static 工具能力
 * @method \ByteDance\Special Special($options = []) static 特殊能力
 * @method \ByteDance\Enterprise Enterprise($options = []) static 企业能力
 * @method \ByteDance\Data Data($options = []) static 数据开放服务
 * @method \ByteDance\Search Search($options = []) static 搜索管理
 * @method \ByteDance\Media Media($options = []) static 素材管理
 * @method \ByteDance\Event Event($options = []) static Webhooks事件订阅
 * @method \ByteDance\Other Other($options = []) static 其它操作
 */
class Dy
{
    /**
     * 静态配置
     */
    private static $config;

    /**
     * 设置及获取参数
     * @param array $option
     * @return array
     */
    public static function config($option = null)
    {
        if (is_array($option)) {
            self::$config = new DataArray($option);
        }
        if (self::$config instanceof DataArray) {
            return self::$config->get();
        }
        return [];
    }

    /**
     * 静态魔术加载方法
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $name = ucfirst(strtolower($name));
        $class = "\\ByteDance\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }
}

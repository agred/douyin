<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 工具能力
 * Class Tool
 * @package ByteDance
 */
class Tool extends BaseApi
{
    /**
     * @title 提供一个接口给开发者校验小程序appid是否可挂载到短视频
     * @Scope micapp.is_legal
     * @url https://open.douyin.com/platform/doc/6848798536256014348
     * @param string $access_token
     * @param string $micapp_id 小程序的micapp_id
     */
    public function devtool_micapp_is_legal($access_token, $micapp_id)
    {
        $api = self::API_DY . '/devtool/micapp/is_legal/';
        $params  = [
            'access_token' => $access_token,
            'micapp_id'    => $micapp_id
        ];
        return $this->get($api, $params);
    }
}

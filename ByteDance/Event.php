<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * Webhooks事件订阅
 * Class Event
 * @package ByteDance
 */
class Event extends BaseApi
{

    /**
     * @title 获取事件订阅状态
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806489101060104
     * @param string $access_token 调用/oauth/client_token/生成的token，此token不需要用户授权
     */
    public function event_status_list($access_token)
    {
        $api_url = self::DOUYIN_API . '/event/status/list/';
        $params = ['access_token' => $access_token];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 更新应用推送事件订阅状态
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806484822771725
     * @param string $access_token 调用/oauth/client_token/生成的token，此token不需要用户授权
     * @param array $list
     */
    public function event_status_update($access_token, $list = [])
    {
        $api_url = self::DOUYIN_API . '/event/status/update/';
        $params = ['access_token' => $access_token];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url , $list);
    }

}

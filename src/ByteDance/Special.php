<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 特殊能力
 * Class Special
 * @package ByteDance
 */
class Special extends BaseApi
{
    /**
     * @title 一次性订阅消息发送
     * @Scope message.once.send
     * @url https://open.douyin.com/platform/doc/6896037584212969480
     * @param string $access_token
     * @param string $open_id
     * @param array $body
     */
    public function message_once_send($access_token, $open_id, $body)
    {
        $api_url = self::API_DY . '/message/once/send/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $body);
    }
}

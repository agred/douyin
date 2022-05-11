<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Enterprise extends BaseApi
{
    /**
     * @title 企业消息卡片-创建/更新消息卡片
     * @Scope enterprise.im
     * @url https://open.douyin.com/platform/doc/6848798235528595467
     * @param string $access_token
     * @param string $open_id
     * @param array $body
     */
    public function enterprise_im_card_save($access_token, $open_id, $body)
    {
        $api_url = self::API_DY . '/enterprise/im/card/save/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $body);
    }

    /**
     * @title 企业消息卡片-获取消息卡片列表
     * @Scope enterprise.im
     * @url https://open.douyin.com/platform/doc/6848798235528562699
     * @param string $access_token
     * @param string $open_id
     * @param string $count
     * @param string $cursor
     */
    public function enterprise_im_card_list($access_token, $open_id, $count = null, $cursor = 10)
    {
        $api_url = self::API_DY . '/enterprise/im/card/list/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id,
            'count'        => $count,
            'cursor'       => $cursor
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 私信管理-发送消息
     * @Scope enterprise.im
     * @url https://open.douyin.com/platform/doc/6848798087226329100
     * @param string $access_token
     * @param string $open_id
     * @param array $body
     */
    public function enterprise_im_message_send($access_token, $open_id, $body)
    {
        $api_url = self::API_DY . '/enterprise/im/message/send/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $body);
    }
}

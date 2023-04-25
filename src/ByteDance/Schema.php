<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 场景跳转
 * Class Video
 * @package ByteDance
 */
class Schema extends BaseApi
{
    /**
     * @title H5分享跳转链接获取
     * @Scope jump.basic
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/interaction-management/jump/h5-share
     * @param string $open_id
     * @param string $access_token
     * @param array $body
     */
    public function get_share($open_id, $access_token, $body = [])
    {
        $api = self::API_DY . '/api/douyin/v1/schema/get_share/';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        return $this->post($api, $body);
    }

    /**
     * @title 个人页跳转链接获取
     * @Scope jump.basic
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/interaction-management/jump/get-user-profile
     * @param $access_token
     * @param $expire_at
     * @param $open_id
     * @param $account
     */
    public function get_user_profile($access_token, $expire_at, $open_id, $account)
    {
        $api = self::API_DY . '/api/douyin/v1/schema/get_user_profile/';
        $params   = [
            'access_token' => $access_token,
            'expire_at' => $expire_at,
            'open_id'      => $open_id,
            'account' => $account
        ];
        $api  = $api . '?' . http_build_query($params);
        return $this->post($api);
    }
}

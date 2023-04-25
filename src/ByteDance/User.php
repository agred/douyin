<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 用户管理
 * Class User
 * @package ByteDance
 */
class User extends BaseApi
{
    /**
     * @title 获取用户公开信息
     * @Scope user_info
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-management/get-account-open-info
     * @param string $open_id
     * @param string $access_token
     */
    public function userinfo($open_id, $access_token)
    {
        $api = self::API_DY . '/oauth/userinfo/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取粉丝列表
     * @Scope fans.list
     * @url https://open.douyin.com/platform/doc/6848806544893675533
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor
     * @param int $count
     */
    public function fans_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api = self::API_DY . '/fans/list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 判断粉丝
     * @Scope fans.check
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-management/fans-judge
     * @param string $open_id
     * @param string $access_token
     * @param string $follower_open_id
     */
    public function fans_check($open_id, $access_token, $follower_open_id)
    {
        $api = self::API_DY . '/fans/check/';
        $params  = [
            'open_id'          => $open_id,
            'access_token'     => $access_token,
            'follower_open_id' => $follower_open_id
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取关注列表
     * @Scope following.list
     * @url https://open.douyin.com/platform/doc/6848806523481737229
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor
     * @param int $count
     */
    public function following_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api = self::API_DY . '/following/list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户手机号
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-management/phone-number-decode-demo
     * @param string $encryptedData
     * @return string
     */
    public function decryptMobile($encryptedData)
    {
        $iv = substr($this->client_secret, 0, 16);
        return openssl_decrypt($encryptedData, 'aes-256-cbc', $this->client_secret, 0, $iv);
    }
}

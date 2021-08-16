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
     * @title 获取用户信息
     * @Scope user_info
     * @url https://open.douyin.com/platform/doc/6848806527751489550
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function userinfo($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/oauth/userinfo/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取粉丝列表
     * @Scope fans.list
     * @url https://open.douyin.com/platform/doc/6848806544893675533
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor
     * @param int $count
     * @return array
     */
    public function fans_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api_url = self::BASE_API . '/fans/list/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 判断粉丝
     * @Scope fans.check
     * @url https://open.douyin.com/platform/doc/6940930610949048334
     * @param string $open_id
     * @param string $access_token
     * @param string $follower_open_id
     * @return array
     */
    public function fans_check($open_id, $access_token, $follower_open_id)
    {
        $api_url = self::BASE_API . '/fans/check/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'follower_open_id' => $follower_open_id
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取关注列表
     * @Scope following.list
     * @url https://open.douyin.com/platform/doc/6848806523481737229
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor
     * @param int $count
     * @return array
     */
    public function following_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api_url = self::BASE_API . '/following/list/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 解密手机号
     * @Scope
     * @url https://open.douyin.com/platform/doc/6943439913106835470
     * @param string $encryptedData
     * @return string
     */
    public function decryptMobile($encryptedData)
    {
        $iv = substr($this->client_secret, 0, 16);
        return openssl_decrypt($encryptedData, 'aes-256-cbc', $this->client_secret, 0, $iv);
    }

}

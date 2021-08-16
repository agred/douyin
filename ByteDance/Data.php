<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 数据开放服务
 * Class Data
 * @package ByteDance
 */
class Data extends BaseApi
{

    /**
     * @title 获取用户视频情况
     * @Scope data.external.user
     * @url https://open.douyin.com/platform/doc/6848798450331486212
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     * @return array
     */
    public function data_external_user_item($open_id, $access_token, $date_type)
    {
        $api_url = self::BASE_API . '/data/external/user/item/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'date_type' => $date_type
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户粉丝数
     * @Scope data.external.user
     * @url https://open.douyin.com/platform/doc/6848798450331453444
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     * @return array
     */
    public function data_external_user_fans($open_id, $access_token, $date_type)
    {
        $api_url = self::BASE_API . '/data/external/user/fans/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'date_type' => $date_type
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户点赞数
     * @Scope data.external.user
     * @url https://open.douyin.com/platform/doc/6848798450331518980
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     * @return array
     */
    public function data_external_user_like($open_id, $access_token, $date_type)
    {
        $api_url = self::BASE_API . '/data/external/user/like/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'date_type' => $date_type
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户评论数
     * @Scope data.external.user
     * @url https://open.douyin.com/platform/doc/6848798450331420676
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     * @return array
     */
    public function data_external_user_comment($open_id, $access_token, $date_type)
    {
        $api_url = self::BASE_API . '/data/external/user/comment/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'date_type' => $date_type
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户分享数
     * @Scope data.external.user
     * @url https://open.douyin.com/platform/doc/6848798471810451459
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     * @return array
     */
    public function data_external_user_share($open_id, $access_token, $date_type)
    {
        $api_url = self::BASE_API . '/data/external/user/share/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'date_type' => $date_type
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户主页访问数
     * @Scope data.external.user
     * @url https://open.douyin.com/platform/doc/6848798450331551748
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     * @return array
     */
    public function data_external_user_profile($open_id, $access_token, $date_type)
    {
        $api_url = self::BASE_API . '/data/external/user/profile/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'date_type' => $date_type
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户粉丝数据
     * @Scope fans.data
     * @url https://open.douyin.com/platform/doc/6848798471810484227
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function fans_data($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/fans/data/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户粉丝来源分布
     * @Scope data.external.fans_source
     * @url https://open.douyin.com/platform/doc/6908972512596543500
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function data_extern_fans_source($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/data/extern/fans/source/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户粉丝喜好
     * @Scope data.external.fans_favourite
     * @url https://open.douyin.com/platform/doc/6908950744699914252
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function data_extern_fans_favourite($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/data/extern/fans/favourite/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取用户粉丝热评
     * @Scope data.external.fans_favourite
     * @url https://open.douyin.com/platform/doc/6908970631979681796
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function data_extern_fans_comment($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/data/extern/fans/comment/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取热门视频数据
     * @Scope data.external.billboard_hot_video
     * @url https://open.douyin.com/platform/doc/6908910551393437707
     * @param string $access_token
     * @return array
     */
    public function data_extern_billboard_hot_video($access_token)
    {
        $api_url = self::BASE_API . '/data/extern/billboard/hot_video/';
        $params = ['access_token' => $access_token];
        return $this->cloud_http_post($api_url, $params);
    }

}

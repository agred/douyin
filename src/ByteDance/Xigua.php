<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 西瓜管理
 * Class Xigua
 * @package ByteDance
 */
class Xigua extends BaseApi
{
    /**
     * @title 获取授权码(code) **该接口同抖音授权接口
     * @Scope
     * @url https://open.douyin.com/platform/doc/6852243568438822925
     * @param array $scope 应用授权作用域['user_info']
     * @param string $redirect_uri 必须以http/https开头
     * @param string $state
     * @param string $optionalScope
     * @return string
     */
    public function connect($scope, $redirect_uri, $state = "", $optionalScope = "")
    {
        $api = self::API_XG . '/oauth/connect/';
        $params = [
            'response_type' => 'code',
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_uri
        ];
        if ($state) {
            $params['state'] = $state;
        }
        if ($optionalScope) {
            $params['optionalScope'] = $optionalScope;
        }
        return $api . '?' . http_build_query($params);
    }

    /**
     * @title 获取用户公开信息
     * @Scope user_info
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/account-management/get-account-open-info
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function userinfo($open_id, $access_token)
    {
        $api = self::API_XG . '/oauth/userinfo/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
        ];
        return $this->post($api, $params);
    }

    /**
     * @title 获取access_token
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806493387606024
     * @param string $code
     * @return array
     */
    public function access_token($code)
    {
        $api = self::API_XG . '/oauth/access_token/';
        $params = [
            'client_key' => $this->client_key,
            'client_secret' => $this->client_secret,
            'code' => $code,
            'grant_type' => 'authorization_code',
        ];
        return $this->post($api, $params);
    }

    /**
     * @title 刷新access_token或续期不会改变refresh_token的有效期
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806497707722765
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     * @return array
     */
    public function refresh_token($refresh_token)
    {
        $api = self::API_XG . '/oauth/refresh_token/';
        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
        return $this->token($api, $params);
    }

    /**
     * @title 生成client_token
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806493387573256
     * @return array
     */
    public function client_token()
    {
        $api = self::API_XG . '/oauth/client_token/';
        $params = ['grant_type' => 'client_credential'];
        return $this->token($api, $params);
    }

    /**
     * @title 查询指定视频数据
     * @Scope xigua.video.data
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/search-video/video-data
     * @param string $open_id
     * @param string $access_token
     * @param mixed $item_ids
     * @return array
     */
    public function video_data($open_id, $access_token, $item_ids)
    {
        $api = self::API_DY . '/xigua/video/data/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);
        $item_ids = [
            'item_ids' => !empty($item_ids) ? [$item_ids] : []
        ];
        return $this->post($api, $item_ids);
    }

    /**
     * @title 查询授权帐号的视频列表
     * @Scope xigua.video.data
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/search-video/account-video-list
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor 分页游标, 第一页请求cursor是0
     * @param int $count 每页数量
     * @return array
     */
    public function video_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api = self::API_DY . '/xigua/video/list/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 上传视频
     * @Scope xigua.video.create
     * @url https://open.douyin.com/platform/doc/6848798087398295555
     * @param string $open_id
     * @param string $access_token
     * @param string $file
     */
    public function video_upload($open_id, $access_token, $file)
    {
        $api = self::API_DY . '/xigua/video/upload/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->requestByte($api, $file);
    }

    /**
     * @title 创建抖音视频
     * @Scope xigua.video.create
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/create-video/publish-video
     * @param string $open_id
     * @param string $access_token
     * @param string $video_id
     * @param string $text
     * @param string $abstract
     * @return array
     */
    public function video_create($open_id, $access_token, $video_id, $text = '', $abstract = '')
    {
        $api = self::API_DY . '/xigua/video/create/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);
        $body = [
            'video_id' => $video_id,
            'text' => $text,
            'abstract' => $abstract,
            'praise' => false,
            'claim_origin' => false,
        ];
        return $this->post($api, $body);
    }

    /**
     * @title 分片初始化上传
     * @Scope xigua.video.create
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/create-video/slice-init-upload
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function video_part_init($open_id, $access_token)
    {
        $api = self::API_DY . '/xigua/video/part/init/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->post($api, $params);
    }

    /**
     * @title 分片上传视频
     * @Scope xigua.video.create
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/create-video/slice-upload
     * @param $open_id
     * @param $access_token
     * @param $upload_id
     * @param $part_number
     * @param $video
     * @return array
     */
    public function video_part_upload($open_id, $access_token, $upload_id, $part_number, $video)
    {
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id,
            'part_number' => $part_number,
        ];
        $api = self::API_DY . '/xigua/video/part/upload/' . '?' . http_build_query($params);

        return $this->post($api, $video);
    }

    /**
     * @title 分片完成上传
     * @Scope xigua.video.create
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/video-management/xigua/create-video/slice-accomplish-upload
     * @param $open_id
     * @param $access_token
     * @param $upload_id
     * @return array
     */
    public function video_part_complete($open_id, $access_token, $upload_id)
    {
        $params = [
            'openid_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id
        ];
        $api = self::API_DY . '/xigua/video/part/complete/';

        return $this->post($api, $params);
    }
}

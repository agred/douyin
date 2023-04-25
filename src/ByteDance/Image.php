<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 图文管理
 * Class Video
 * @package ByteDance
 */
class Image extends BaseApi
{
    /**
     * @title 创建图文
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-image-text/create-image-text
     * @param string $open_id
     * @param string $access_token
     * @param array $body
     */
    public function create_image($open_id, $access_token, $body = [])
    {
        $api = self::API_DY . '/api/douyin/v1/video/create_image_text/';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        return $this->post($api, $body);
    }

    /**
     * @title 图片上传
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-image-text/image-upload
     * @param string $open_id
     * @param string $access_token
     * @param string $file
     */
    public function upload_image($open_id, $access_token, $file)
    {
        $api = self::API_DY . '/api/douyin/v1/video/upload_image/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->requestByte($api, $file);
    }
}

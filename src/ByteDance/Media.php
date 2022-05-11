<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

class Media extends BaseApi
{
    /**
     * @title 素材管理-上传素材
     * @Scope im
     * @url https://open.douyin.com/platform/doc/6848798342919571459
     * @param string $access_token
     * @param string $open_id
     * @param string $file
     */
    public function enterprise_media_upload($access_token, $open_id, $file)
    {
        $api_url = self::API_DY . '/enterprise/media/upload/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_file($api_url, $file);
    }

    /**
     * @title 素材管理-上传临时素材
     * @Scope enterprise.im
     * @url https://open.douyin.com/platform/doc/6848798342919604227
     * @param string $access_token
     * @param string $open_id
     * @param string $file
     */
    public function enterprise_media_temp_upload($access_token, $open_id, $file)
    {
        $api_url = self::API_DY . '/enterprise/media/temp/upload/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_file($api_url, $file);
    }

    /**
     * @title 素材管理-获取永久素材列表
     * @Scope im
     * @url https://open.douyin.com/platform/doc/6848798342919538691
     * @param string $access_token
     * @param string $open_id
     * @param string $count
     * @param string $cursor
     */
    public function enterprise_media_list($access_token, $open_id, $count = null, $cursor = 10)
    {
        $api_url = self::API_DY . '/enterprise/media/list/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id,
            'count'        => $count,
            'cursor'       => $cursor
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 素材管理-删除永久素材
     * @Scope im
     * @url https://open.douyin.com/platform/doc/6848798342919505923
     * @param string $access_token
     * @param string $open_id
     * @param array $body ['media_id' => 'xxx']
     */
    public function enterprise_media_delete($access_token, $open_id, $body)
    {
        $api_url = self::API_DY . '/enterprise/media/delete/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $body);
    }
}

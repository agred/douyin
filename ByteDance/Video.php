<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 视频管理
 * Class Video
 * @package ByteDance
 */
class Video extends BaseApi
{

    /**
     * @title 查询指定视频数据
     * @Scope video.data
     * @url https://open.douyin.com/platform/doc/6848806544931325965
     * @param string $open_id
     * @param string $access_token
     * @param string $item_ids
     * @return array
     */
    public function video_data($open_id, $access_token, $item_ids)
    {
        $api_url = self::BASE_API . '/video/data/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'item_ids' => implode(',', !empty($item_ids) ? $item_ids : [])
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 查询授权账号视频数据
     * @Scope video.list
     * @url https://open.douyin.com/platform/doc/6848806536383318024
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor 分页游标, 第一页请求cursor是0
     * @param int $count 每页数量
     * @return array
     */
    public function video_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api_url = self::BASE_API . '/video/list/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 上传视频
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398295555
     * @param string $open_id
     * @param string $access_token
     * @param string $file
     * @return array
     */
    public function video_upload($open_id, $access_token, $file)
    {
        $api_url = self::BASE_API . '/video/upload/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->https_byte($api_url, $file);
    }

    /**
     * @title 创建抖音视频
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398328323
     * @param string $open_id
     * @param string $access_token
     * @param string $video_id
     * @param string $text
     * @param array $othes
     * @return array
     */
    public function video_create($open_id, $access_token, $video_id, $text = '', $othes = [])
    {
        $api_url = self::BASE_API . '/video/create/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'video_id' => $video_id,
            'text' => $text,
            'poi_name' => !empty($othes['poi_name']) ? $othes['poi_name'] : '',
            'poi_share' => !empty($othes['poi_share']) ? $othes['poi_share'] : '',
            'real_share' => !empty($othes['real_share']) ? $othes['real_share'] : '',
            'real_open_id' => !empty($othes['real_open_id']) ? $othes['real_open_id'] : '',
            'micro_app_id' => !empty($othes['micro_app_id']) ? $othes['micro_app_id'] : '',
            'micro_app_title' => !empty($othes['micro_app_title']) ? $othes['micro_app_title'] : '',
            'micro_app_url' => !empty($othes['micro_app_url']) ? $othes['micro_app_url'] : '',
            'at_users' => !empty($othes['$at_users']) ? $othes['$at_users'] : [],
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 删除视频
     * @Scope video.delete
     * @url https://open.douyin.com/platform/doc/6848806536383383560
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @return array
     */
    public function video_delete($open_id, $access_token, $item_id)
    {
        $api_url = self::BASE_API . '/video/delete/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'item_id' => $item_id,
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 初始化分片上传
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398393859
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function video_part_init($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/video/part/init/';
        $params = [
            'open_id_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 上传视频分片到文件服务器
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087226460172
     * @param string $open_id
     * @param string $access_token
     * @param string $upload_id
     * @param string $part_number
     * @param array $video
     * @return array
     */
    public function video_part_upload($open_id, $access_token, $upload_id, $part_number, $video)
    {
        $params = [
            'open_id_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id,
            'part_number' => $part_number,
        ];
        $api_url = self::BASE_API . '/video/part/upload/' . '?' . http_build_query($params);
        return $this->cloud_http_post($api_url, $video);
    }

    /**
     * @title 分片完成上传
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398361091
     * @param string $open_id
     * @param string $access_token
     * @param string $upload_id
     * @return array
     */
    public function video_part_complete($open_id, $access_token, $upload_id)
    {
        $params = [
            'open_id_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id
        ];
        $api_url = self::BASE_API . '/video/part/complete/';
        return $this->cloud_http_post($api_url, $params);
    }

}

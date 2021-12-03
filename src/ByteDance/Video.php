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
     * @param mixed $item_ids
     */
    public function video_data($open_id, $access_token, $item_ids)
    {
        $api_url = self::DOUYIN_API . '/video/data/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        $item_ids = [
            'item_ids' => !empty($item_ids) ? $item_ids : []
        ];
        return $this->https_post($api_url , $item_ids);
    }

    /**
     * @title 查询授权账号视频数据
     * @Scope video.list
     * @url https://open.douyin.com/platform/doc/6848806536383318024
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor 分页游标, 第一页请求cursor是0
     * @param int $count 每页数量
     */
    public function video_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api_url = self::DOUYIN_API . '/video/list/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 上传视频
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398295555
     * @param string $open_id
     * @param string $access_token
     * @param string $file
     */
    public function video_upload($open_id, $access_token, $file)
    {
        $api_url = self::DOUYIN_API . '/video/upload/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->https_byte($api_url, $file);
    }

    /**
     * @title 创建抖音视频
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398328323
     * @param string $open_id
     * @param string $access_token
     * @param array $dataBody
     */
    public function video_create($open_id, $access_token, $dataBody = [])
    {
        $api_url = self::DOUYIN_API . '/video/create/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url , $dataBody);
    }

    /**
     * @title 删除视频
     * @Scope video.delete
     * @url https://open.douyin.com/platform/doc/6848806536383383560
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     */
    public function video_delete($open_id, $access_token, $item_id)
    {
        $api_url = self::DOUYIN_API . '/video/delete/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url , $item_id);
    }

    /**
     * @title 初始化分片上传
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398393859
     * @param string $open_id
     * @param string $access_token
     */
    public function video_part_init($open_id, $access_token)
    {
        $api_url = self::DOUYIN_API . '/video/part/init/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url);
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
     */
    public function video_part_upload($open_id, $access_token, $upload_id, $part_number, $video = [])
    {
        $api_url = self::DOUYIN_API . '/video/part/upload/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id,
            'part_number' => $part_number,
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $video);
    }

    /**
     * @title 分片完成上传
     * @Scope video.create
     * @url https://open.douyin.com/platform/doc/6848798087398361091
     * @param string $open_id
     * @param string $access_token
     * @param string $upload_id
     */
    public function video_part_complete($open_id, $access_token, $upload_id)
    {
        $api_url = self::DOUYIN_API . '/video/part/complete/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'upload_id' => $upload_id
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url);
    }

    /**
     * @title 获取share-id
     * @Scope aweme.share
     * @url https://open.douyin.com/platform/doc/6848798622172121099
     * @param string $access_token
     * @param bool $need_callback
     */
    public function share_id($access_token, $need_callback = true)
    {
        $api_url = self::DOUYIN_API . '/share-id/';
        $params = [
            'access_token' => $access_token,
            'need_callback' => $need_callback,
            'default_hashtag' => 'hashtag'
        ];
        return $this->https_get($api_url, $params);
    }

}

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
     * @title 查询特定视频的视频数据
     * @Scope video.data.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/search-video/video-data
     * @param string $open_id
     * @param string $access_token
     * @param mixed $item_ids
     */
    public function video_data($open_id, $access_token, $item_ids)
    {
        $api  = self::API_DY . '/api/douyin/v1/video/video_data/';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        $item_ids = [
            'item_ids' => !empty($item_ids) ? $item_ids : []
        ];
        return $this->post($api, $item_ids);
    }

    /**
     * @title 查询授权账号视频列表
     * @Scope video.list.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/search-video/account-video-list
     * @param string $open_id
     * @param string $access_token
     * @param int $cursor 分页游标, 第一页请求cursor是0
     * @param int $count 每页数量
     */
    public function video_list($open_id, $access_token, $cursor = 0, $count = 20)
    {
        $api = self::API_DY . '/api/douyin/v1/video/video_list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 查询抖音视频来源
     * @Scope video.data
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/search-video/douyin-video-origin
     * @param string $open_id
     * @param string $access_token
     */
    public function video_source($open_id, $access_token)
    {
        $api = self::API_DY . '/video/source/1';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        $item_ids = [
            'item_ids' => !empty($item_ids) ? $item_ids : []
        ];
        return $this->post($api, $item_ids);
    }

    /**
     * @title 上传视频
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-video/upload-video
     * @param string $open_id
     * @param string $access_token
     * @param string $file
     */
    public function video_upload($open_id, $access_token, $file)
    {
        $api = self::API_DY . '/api/douyin/v1/video/upload_video/?open_id=' . $open_id . '&access_token=' . $access_token;
        return $this->requestByte($api, $file);
    }

    /**
     * @title 创建视频
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-video/video-create
     * @param string $open_id
     * @param string $access_token
     * @param array $dataBody
     */
    public function video_create($open_id, $access_token, $dataBody = [])
    {
        $api = self::API_DY . '/api/douyin/v1/video/create_video/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api, $dataBody);
    }

    // /**
    //  * @title 删除视频
    //  * @Scope video.delete
    //  * @url https://open.douyin.com/platform/doc/6848806536383383560
    //  * @param string $open_id
    //  * @param string $access_token
    //  * @param string $item_id
    //  */
    // public function video_delete($open_id, $access_token, $item_id)
    // {
    //     $api = self::API_DY . '/video/delete/';
    //     $params  = [
    //         'open_id'      => $open_id,
    //         'access_token' => $access_token
    //     ];
    //     $api = $api . '?' . http_build_query($params);
    //     return $this->post($api, $item_id);
    // }

    /**
     * @title 分片上传初始化
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-video/video-part-upload-init
     * @param string $open_id
     * @param string $access_token
     */
    public function video_part_init($open_id, $access_token)
    {
        $api = self::API_DY . '/api/douyin/v1/video/init_video_part_upload/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api);
    }

    /**
     * @title 分片上传
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-video/video-part-upload
     * @param string $open_id
     * @param string $access_token
     * @param string $upload_id
     * @param string $part_number
     * @param array $video
     */
    public function video_part_upload($open_id, $access_token, $upload_id, $part_number, $video = [])
    {
        $api = self::API_DY . '/api/douyin/v1/video/upload_video_part/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'upload_id'    => $upload_id,
            'part_number'  => $part_number,
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api, $video);
    }

    /**
     * @title 分片上传完成
     * @Scope video.create.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/create-video/video-part-upload-complete
     * @param string $open_id
     * @param string $access_token
     * @param string $upload_id
     */
    public function video_part_complete($open_id, $access_token, $upload_id)
    {
        $api = self::API_DY . '/api/douyin/v1/video/complete_video_part_upload/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'upload_id'    => $upload_id
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api);
    }

    /**
     * @title 获取share-id
     * @Scope aweme.share
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/search-video/video-share-result
     * @param string $access_token
     * @param bool $need_callback
     */
    public function share_id($access_token, $need_callback = true)
    {
        $api = self::API_DY . '/share-id/';
        $params  = [
            'access_token'    => $access_token,
            'need_callback'   => $need_callback,
            'default_hashtag' => 'hashtag'
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 关键词视频搜索
     * @Scope video.search
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/search-management/keywords-video-list/keywords-video
     * @param string $access_token
     * @param string $open_id
     * @param string $keyword
     * @param int $cursor
     * @param int $count
     * @return mixed
     */
    public function video_search($access_token, $open_id, $keyword, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/video/search/';
        $params  = [
            'access_token' => $access_token,
            'open_id'      => $open_id,
            'keyword'      => $keyword,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 关键词视频评论列表
     * @Scope video.search.comment
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/search-management/keywords-video-comment-management/comment-list
     * @param string $access_token
     * @param string $sec_item_id
     * @param int $cursor
     * @param int $count
     * @return mixed
     */
    public function video_search_comment_list($access_token, $sec_item_id, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/video/search/comment/list/';
        $params  = [
            'access_token' => $access_token,
            'sec_item_id'  => $sec_item_id,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 关键词视频评论回复
     * @Scope video.search.comment
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/search-management/keywords-video-comment-management/comment-reply
     * @param string $access_token
     * @param string $open_id
     * @param string $sec_item_id
     * @param string $content
     * @param string $comment_id
     * @return mixed
     */
    public function video_search_comment_reply($access_token, $open_id, $sec_item_id, $content, $comment_id = null)
    {
        $api  = self::API_DY . '/video/search/comment/reply/';
        $params   = [
            'access_token' => $access_token,
            'open_id'      => $open_id,
        ];
        $api  = $api . '?' . http_build_query($params);
        $dataBody = [
            'sec_item_id' => $sec_item_id,
            'content'     => $content
        ];
        if ($comment_id) {
            $dataBody['comment_id'] = $comment_id;
        }
        return $this->post($api, $dataBody);
    }

    /**
     * @title 关键词视频评论回复列表
     * @Scope video.search.comment
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/search-management/keywords-video-comment-management/comment-reply-list
     * @param string $access_token
     * @param string $comment_id
     * @param string $sec_item_id
     * @param int $cursor
     * @param int $count
     * @return mixed
     */
    public function video_search_comment_reply_list($access_token, $comment_id, $sec_item_id, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/video/search/comment/reply/list/';
        $params  = [
            'access_token' => $access_token,
            'comment_id'   => $comment_id,
            'sec_item_id'  => $sec_item_id,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }
}

<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 搜索管理
 * Class Poi
 * @package ByteDance
 */
class Search extends BaseApi
{

    /**
     * @title 关键词视频搜索
     * @Scope video.search
     * @url https://open.douyin.com/platform/doc/6848806544931358733
     * @param string $open_id
     * @param string $access_token
     * @param string $keyword
     * @param int $cursor
     * @param int $count
     * @return array
     */
    public function video_search($open_id, $access_token, $keyword, $cursor = 0, $count = 20)
    {
        $api_url = self::BASE_API . '/video/search/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'keyword' => $keyword,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 关键词视频评论列表
     * @Scope video.search.comment
     * @url https://open.douyin.com/platform/doc/6857340280354457614
     * @param string $access_token
     * @param string $sec_item_id
     * @param int $cursor
     * @param int $count
     * @return array
     */
    public function video_search_comment_list($access_token, $sec_item_id, $cursor = 0, $count = 20)
    {
        $api_url = self::BASE_API . '/video/search/comment/list/';
        $params = [
            'access_token' => $access_token,
            'sec_item_id' => $sec_item_id,
            'cursor' => $cursor,
            'count' => $count,
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 关键词视频评论回复
     * @Scope video.search.comment
     * @url https://open.douyin.com/platform/doc/6857389572192520200
     * @param string $open_id
     * @param string $access_token
     * @return array
     */
    public function video_search_comment_reply($open_id, $access_token)
    {
        $api_url = self::BASE_API . '/video/search/comment/reply/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token
        ];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 关键词视频评论回复列表
     * @Scope video.search.comment
     * @url https://open.douyin.com/platform/doc/6857375753722447879
     * @param string $access_token
     * @param string $sec_item_id
     * @param string $comment_id
     * @param int $cursor
     * @param int $count
     * @return array
     */
    public function video_search_comment_reply_list($access_token, $sec_item_id, $comment_id, $cursor = 0, $count = 20)
    {
        $api_url = self::BASE_API . '/video/search/comment/reply/list/';
        $params = [
            'access_token' => $access_token,
            'sec_item_id' => $sec_item_id,
            'comment_id' => $comment_id,
            'cursor' => $cursor,
            'count' => $count
        ];
        return $this->cloud_http_post($api_url, $params);
    }

}

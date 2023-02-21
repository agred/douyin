<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 评论管理
 * Class Comment
 * @package ByteDance
 */
class Comment extends BaseApi
{
    /**
     * @title 评论管理（普通用户）-评论列表
     * @Scope item.comment
     * @url https://open.douyin.com/platform/doc/6848798514797938700
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $sort_type
     * @param string $cursor
     * @param string $count
     */
    public function get_list($open_id, $access_token, $item_id, $sort_type, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/item/comment/list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'item_id'      => $item_id,
            'sort_type'    => $sort_type,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 评论管理（普通用户）-评论回复列表
     * @Scope item.comment
     * @url https://open.douyin.com/platform/doc/6848806819897411591
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $comment_id
     * @param string $sort_type
     * @param string $cursor
     * @param string $count
     */
    public function reply_list($open_id, $access_token, $item_id, $comment_id, $sort_type, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/item/comment/reply/list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'item_id'      => $item_id,
            'comment_id'   => $comment_id,
            'sort_type'    => $sort_type,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 评论管理（普通用户）-回复视频评论
     * @Scope item.comment
     * @url https://open.douyin.com/platform/doc/6848798514797971468
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $comment_id
     * @param string $content
     */
    public function reply($open_id, $access_token, $item_id, $comment_id, $content)
    {
        $api  = self::API_DY . '/item/comment/reply/';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        $dataBody = [
            'item_id'    => $item_id,
            'comment_id' => $comment_id,
            'content'    => $content
        ];
        return $this->post($api, $dataBody);
    }

    /**
     * @title 评论管理（企业号）-评论列表
     * @Scope video.comment
     * @url https://open.douyin.com/platform/doc/6848806536383350792
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $cursor
     * @param string $count
     */
    public function enterprise_list($open_id, $access_token, $item_id, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/video/comment/list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'item_id'      => $item_id,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 评论管理（企业号）-评论回复列表
     * @Scope video.comment
     * @url https://open.douyin.com/platform/doc/6848834943854888964
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $comment_id
     * @param string $cursor
     * @param string $count
     */
    public function enterprise_reply_list($open_id, $access_token, $item_id, $comment_id, $cursor = 0, $count = 10)
    {
        $api = self::API_DY . '/video/comment/reply/list/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'item_id'      => $item_id,
            'comment_id'   => $comment_id,
            'cursor'       => $cursor,
            'count'        => $count
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 评论管理（企业号）-回复视频评论
     * @Scope item.comment
     * @url https://open.douyin.com/platform/doc/6848806527751587854
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $comment_id
     * @param string $content
     */
    public function enterprise_reply($open_id, $access_token, $item_id, $comment_id, $content)
    {
        $api  = self::API_DY . '/video/comment/reply/';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        $dataBody = [
            'item_id'    => $item_id,
            'comment_id' => $comment_id,
            'content'    => $content
        ];
        return $this->post($api, $dataBody);
    }

    /**
     * @title 评论管理（企业号）-置顶视频评论
     * @Scope item.comment
     * @url https://open.douyin.com/platform/doc/6848806527751587854
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $comment_id
     * @param bool $top
     */
    public function enterprise_top($open_id, $access_token, $item_id, $comment_id, $top = false)
    {
        $api  = self::API_DY . '/video/comment/top/';
        $params   = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        $api  = $api . '?' . http_build_query($params);
        $dataBody = [
            'item_id'    => $item_id,
            'comment_id' => $comment_id,
            'top'        => $top
        ];
        return $this->post($api, $dataBody);
    }
}

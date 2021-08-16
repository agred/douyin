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
     * @title 回复视频评论
     * @Scope item.comment
     * @url https://open.douyin.com/platform/doc/6848798514797971468
     * @param string $open_id
     * @param string $access_token
     * @param string $item_id
     * @param string $content
     * @return array
     */
    public function reply($open_id, $access_token, $item_id, $content)
    {
        $dyapi = self::BASE_API . '/item/comment/reply/';
        $params = [
            'open_id' => $open_id,
            'access_token' => $access_token,
            'item_id' => $item_id,
            'content' => $content
        ];
        return $this->cloud_http_post($dyapi, $params);
    }

}

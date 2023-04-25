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
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/user-data/get-user-video-status
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     */
    public function data_external_user_item($open_id, $access_token, $date_type)
    {
        $api = self::API_DY . '/data/external/user/item/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'date_type'    => $date_type
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户粉丝数
     * @Scope data.external.user
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/user-data/get-user-fans-count
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     */
    public function data_external_user_fans($open_id, $access_token, $date_type)
    {
        $api = self::API_DY . '/data/external/user/fans/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'date_type'    => $date_type
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户点赞数
     * @Scope data.external.user
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/user-data/get-user-like-number
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     */
    public function data_external_user_like($open_id, $access_token, $date_type)
    {
        $api = self::API_DY . '/data/external/user/like/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'date_type'    => $date_type
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户评论数
     * @Scope data.external.user
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/user-data/get-user-comment-count
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     */
    public function data_external_user_comment($open_id, $access_token, $date_type)
    {
        $api = self::API_DY . '/data/external/user/comment/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'date_type'    => $date_type
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户分享数
     * @Scope data.external.user
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/user-data/get-user-share-count
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     */
    public function data_external_user_share($open_id, $access_token, $date_type)
    {
        $api = self::API_DY . '/data/external/user/share/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'date_type'    => $date_type
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户主页访问数
     * @Scope data.external.user
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/user-data/get-user-home-pv
     * @param string $open_id
     * @param string $access_token
     * @param int $date_type 输入7代表7天、15代表15天、30代表30天
     */
    public function data_external_user_profile($open_id, $access_token, $date_type)
    {
        $api = self::API_DY . '/data/external/user/profile/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token,
            'date_type'    => $date_type
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户粉丝数据
     * @Scope fans.data.bind
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/fans-portrait-data/get-user-fans-data
     * @param string $open_id
     * @param string $access_token
     */
    public function fans_data($open_id, $access_token)
    {
        $api = self::API_DY . '/api/douyin/v1/user/fans_data/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户粉丝来源分布
     * @Scope data.external.fans_source
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/fans-portrait-data/get-user-fans-origin
     * @param string $open_id
     * @param string $access_token
     */
    public function data_extern_fans_source($open_id, $access_token)
    {
        $api = self::API_DY . '/data/extern/fans/source/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户粉丝喜好
     * @Scope data.external.fans_favourite
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/fans-portrait-data/get-user-fans-like
     * @param string $open_id
     * @param string $access_token
     */
    public function data_extern_fans_favourite($open_id, $access_token)
    {
        $api = self::API_DY . '/data/extern/fans/favourite/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取用户粉丝热评
     * @Scope data.external.fans_favourite
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/fans-portrait-data/get-user-fans-hot-comment
     * @param string $open_id
     * @param string $access_token
     */
    public function data_extern_fans_comment($open_id, $access_token)
    {
        $api = self::API_DY . '/data/extern/fans/comment/';
        $params  = [
            'open_id'      => $open_id,
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取热门视频数据
     * @Scope data.external.billboard_hot_video
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/tops-data/hot-video-list/hot-video-list/
     * @param string $access_token
     */
    public function data_extern_billboard_hot_video($access_token)
    {
        $api = self::API_DY . '/data/extern/billboard/hot_video/';
        $params  = ['access_token' => $access_token];
        return $this->get($api, $params);
    }

    /**
     * @title 获取抖音星图达人热榜
     * @Scope star_tops
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/star-data/star-tops/get-star-author-hot-list
     * @param string $hot_list_type
     */
    public function star_hot_list($hot_list_type)
    {
        $api = self::API_DY . '/star/hot_list/';
        $params  = ['hot_list_type' => $hot_list_type];
        return $this->get($api, $params);
    }

    /**
     * @title 获取抖音星图达人指数
     * @Scope star_top_score_display
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/star-data/star-author/get-star-author-data
     * @param string $open_id
     */
    public function star_author_score($open_id)
    {
        $api = self::API_DY . '/star/author_score/';
        $params  = ['open_id' => $open_id];
        return $this->get($api, $params);
    }

    /**
     * @title 获取抖音星图达人指数数据V2
     * @Scope star_author_score_display
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/data-open-service/star-data/star-author/get-star-author-data-v2
     * @param string $unique_id
     */
    public function star_author_score_v2($unique_id)
    {
        $api = self::API_DY . '/star/author_score_v2/';
        $params  = ['unique_id' => $unique_id];
        return $this->get($api, $params);
    }

    /**
     * @title 获取小程序点击量视频分布
     * @Scope data.external.anchor
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/data-open-service/mini-app-list/get-video-click-distribution
     * @param string $open_id
     * @param string $access_token
     * @param string $mp_id
     * @param int $date_type
     */
    public function mp_item_click_distribution($open_id, $access_token, $mp_id, $date_type)
    {
        $api = self::API_DY . '/data/external/anchor/mp_item_click_distribution/';
        $params  = [
            'unique_id'    => $open_id,
            'access_token' => $access_token,
            'mp_id'        => $mp_id,
            'date_type'    => $date_type,
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取实时热点词
     * @Scope hotsearch
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/data-open-service/hot-video-data/get-current-hot-words
     */
    public function hotsearch_sentences()
    {
        return $this->get(self::API_DY . '/hotsearch/sentences/');
    }

    /**
     * @title 获取上升词
     * @Scope hotsearch
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/data-open-service/hot-video-data/get-ascending-words
     * @param string $cursor
     * @param string $count
     */
    public function hotsearch_trending_sentences($cursor, $count)
    {
        $api = self::API_DY . '/hotsearch/trending/sentences/';
        $params  = [
            'cursor' => $cursor,
            'count'  => $count,
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取热点词聚合的视频
     * @Scope hotsearch
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/data-open-service/hot-video-data/get-hot-words-polymerization-video
     * @param string $hot_sentence
     */
    public function hotsearch_videos($hot_sentence)
    {
        $api = self::API_DY . '/hotsearch/videos/';
        $params  = [
            'hot_sentence' => $hot_sentence,
        ];
        return $this->get($api, $params);
    }
}

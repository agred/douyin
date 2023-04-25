<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 商铺管理
 * Class Poi
 * @package ByteDance
 */
class Poi extends BaseApi
{
    /**
     * @title 商铺同步
     * @Scope poi.product
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/life-service-open-ability/micro-app/shop/synchronism/
     * @param string $access_token
     * @param array $dataBody
     */
    public function supplier_sync($access_token, $dataBody = [])
    {
        $api = self::API_DY . '/poi/supplier/sync/';
        $params  = [
            'access_token' => $access_token,
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api, $dataBody);
    }

    /**
     * @title 店铺匹配状态查询
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/life-service-open-ability/micro-app/shop/status-query
     * @param string $access_token
     * @param string $supplier_ext_id
     */
    public function supplier_query_supplier($access_token, $supplier_ext_id)
    {
        $api = self::API_DY . '/poi/v2/supplier/query/supplier/';
        $params  = [
            'access_token'    => $access_token,
            'supplier_ext_id' => $supplier_ext_id
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 通过高德POI ID获取抖音POI ID
     * @Scope poi.base
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/life-service-open-ability/micro-app/poi-basic-ability/get-douyin-id-by-autoNavi-id/
     * @param string $access_token
     * @param string $amap_id 高德POI ID
     */
    public function base_query_amap($access_token, $amap_id)
    {
        $api = self::API_DY . '/poi/base/query/amap/';
        $params  = [
            'access_token' => $access_token,
            'amap_id'      => $amap_id
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 优惠券同步
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/life-service-open-ability/micro-app/coupon/coupon-sync
     * @param string $access_token
     * @param array $dataBody
     */
    public function coupon_sync($access_token, $dataBody = [])
    {
        $api = self::API_DY . '/poi/v2/coupon/sync/';
        $params  = [
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api, $dataBody);
    }

    /**
     * @title 优惠券更新
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/life-service-open-ability/micro-app/coupon/coupon-update
     * @param string $access_token
     * @param array $dataBody
     */
    public function coupon_sync_available($access_token, $dataBody = [])
    {
        $api = self::API_DY . '/poi/v2/coupon/sync/coupon_available/';
        $params  = [
            'access_token' => $access_token
        ];
        $api = $api . '?' . http_build_query($params);
        return $this->post($api, $dataBody);
    }

    /**
     * @title 查询视频携带的地点信息
     * @Scope poi.search
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/video-management/douyin/search-video/video-poi
     * @param string $access_token
     * @param int $cursor 分页游标, 第一页请求cursor是0
     * @param int $count 每页数量
     * @param string $keyword 查询关键字，例如美食
     * @param string $city 查询城市，例如上海、北京
     */
    public function poi_search_keyword($access_token, $cursor = 0, $count = 20, $keyword = '', $city = '')
    {
        $api = self::API_DY . '/poi/search/keyword/';
        $params  = [
            'access_token' => $access_token,
            'cursor'       => $cursor,
            'count'        => $count,
            'keyword'      => $keyword,
            'city'         => $city
        ];
        return $this->get($api, $params);
    }
}

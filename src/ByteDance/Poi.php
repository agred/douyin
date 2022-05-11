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
     * @url https://open.douyin.com/platform/doc/6848798600688961547
     * @param string $access_token
     * @param array $dataBody
     */
    public function supplier_sync($access_token, $dataBody = [])
    {
        $api_url = self::API_DY . '/poi/supplier/sync/';
        $params  = [
            'access_token' => $access_token,
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $dataBody);
    }

    /**
     * @title 店铺匹配状态查询
     * @Scope
     * @url https://open.douyin.com/platform/doc/6948302162829101059
     * @param string $access_token
     * @param string $supplier_ext_id
     */
    public function supplier_query_supplier($access_token, $supplier_ext_id)
    {
        $api_url = self::API_DY . '/poi/v2/supplier/query/supplier/';
        $params  = [
            'access_token'    => $access_token,
            'supplier_ext_id' => $supplier_ext_id
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 通过高德POI ID获取抖音POI ID
     * @Scope poi.base
     * @url https://open.douyin.com/platform/doc/6848798579239192588
     * @param string $access_token
     * @param string $amap_id 高德POI ID
     */
    public function base_query_amap($access_token, $amap_id)
    {
        $api_url = self::API_DY . '/poi/base/query/amap/';
        $params  = [
            'access_token' => $access_token,
            'amap_id'      => $amap_id
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 优惠券同步
     * @Scope
     * @url https://open.douyin.com/platform/doc/6985920247903701005
     * @param string $access_token
     * @param array $dataBody
     */
    public function coupon_sync($access_token, $dataBody = [])
    {
        $api_url = self::API_DY . '/poi/v2/coupon/sync/';
        $params  = [
            'access_token' => $access_token
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $dataBody);
    }

    /**
     * @title 优惠券更新
     * @Scope
     * @url https://open.douyin.com/platform/doc/6985920590397966372
     * @param string $access_token
     * @param array $dataBody
     */
    public function coupon_sync_available($access_token, $dataBody = [])
    {
        $api_url = self::API_DY . '/poi/v2/coupon/sync/coupon_available/';
        $params  = [
            'access_token' => $access_token
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_post($api_url, $dataBody);
    }

    /**
     * @title 查询POI信息
     * @Scope poi.search
     * @url https://open.douyin.com/platform/doc/6848806527751555086
     * @param string $access_token
     * @param int $cursor 分页游标, 第一页请求cursor是0
     * @param int $count 每页数量
     * @param string $keyword 查询关键字，例如美食
     * @param string $city 查询城市，例如上海、北京
     */
    public function poi_search_keyword($access_token, $cursor = 0, $count = 20, $keyword = '', $city = '')
    {
        $api_url = self::API_DY . '/poi/search/keyword/';
        $params  = [
            'access_token' => $access_token,
            'cursor'       => $cursor,
            'count'        => $count,
            'keyword'      => $keyword,
            'city'         => $city
        ];
        return $this->https_get($api_url, $params);
    }
}

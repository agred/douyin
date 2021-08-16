<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 其他数据管理
 * Class Othe
 * @package ByteDance
 */
class Othe extends BaseApi
{

    /**
     * @title 获取抖音用户主页 Url scheme
     * @param string $share_url 地址
     * @return string
     */
    public function get_user_profile($share_url)
    {
        $headers = get_headers($share_url, true);
        $response = '';
        if (is_array($headers['Location'])) {
            $location = $headers['Location'][0];
            $location_arr = explode('?', $location);
            $uid = str_replace('https://www.iesdouyin.com/share/user/', '', $location_arr[0]);
            //$sec_uid = get_query_str($location, 'sec_uid');
            $params = ['uid' => $uid, 'type' => 'user.profile'];
            $response = get_url_scheme($params);
        }
        return $response;
    }

    /**
     * @title 获取抖音视频 Url scheme
     * @param string $share_url 地址
     * @return string
     */
    public function get_aweme_detail($share_url)
    {
        $headers = get_headers($share_url, true);
        $response = '';
        if (is_array($headers['Location'])) {
            $location = $headers['Location'][1];
            $location_arr = explode('?', $location);
            $id = str_replace('https://www.douyin.com/video/', '', $location_arr[0]);
            $params = ['id' => $id, 'type' => 'aweme.detail'];
            $response = get_url_scheme($params);
        }
        return $response;
    }

    /**
     * @title 获取抖音poi详情 Url scheme
     * @param string $share_url 地址
     * @return string
     */
    public function get_poi_detail($share_url)
    {
        $headers = get_headers($share_url, true);
        $location = $headers['Location'];
        $id = get_query_str($location, 'id');
        $params = ['id' => $id, 'type' => 'poi.detail'];
        return get_url_scheme($params);
    }

}

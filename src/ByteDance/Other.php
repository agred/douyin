<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 其他数据管理
 * Class Other
 * @package ByteDance
 */
class Other extends BaseApi
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
            if ($uid && !is_numeric($uid)) {
                $callback = file_get_contents('https://www.iesdouyin.com/web/api/v2/user/info/?sec_uid=' . $uid);
                $callback_data = json_decode($callback, true);
                $uid = !empty($callback_data['user_info']['uid']) ? $callback_data['user_info']['uid'] : 0;
            }
        }
        $params = ['uid' => empty($uid) ? 0 : $uid, 'type' => 'user.profile'];
        return get_url_scheme($params);
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

<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * @title 获取URL某个参数的值
 * @param string $url 路径
 * @param string $key 要获取的参数
 * @return string
 */
function get_query_str($url, $key)
{
    $res = '';
    $a   = strpos($url, '?');
    if ($a !== false) {
        $str = substr($url, $a + 1);
        $arr = explode('&', $str);
        foreach ($arr as $k => $v) {
            $tmp = explode('=', $v);
            if (!empty($tmp[0]) && !empty($tmp[1])) {
                $barr[$tmp[0]] = $tmp[1];
            }
        }
    }
    if (!empty($barr[$key])) {
        $res = $barr[$key];
    }
    return $res;
}

/**
 * @title 是否抖音客户端
 * @return bool
 */
if (!function_exists('is_byteLocale')) {
    function is_byteLocale()
    {
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'bytelocale') !== false) {
            return true;
        }
        return false;
    }
}

/**
 * @title 是否苹果iphone
 * @return bool
 */
if (!function_exists('is_iphone')) {
    function is_iphone()
    {
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'iphone') !== false) {
            return true;
        }
        return false;
    }
}

/**
 * @title 获取抖音URL Scheme
 * @param array $params 参数
 * @return string
 */
function get_url_scheme($params = [])
{
    switch ($params['type']) {
        case 'user.profile':
            if (is_iphone()) {
                $link = 'snssdk1128://user/profile/' . $params['uid'] . '?refer=web&gd_label=click_wap_profile_bottom&type=need_follow&needlaunchlog=1';
            } else {
                $link = 'snssdk1128://user/profile/' . $params['uid'] . '?refer=web&gd_label=click_wap_download_follow&type=need_follow&needlaunchlog=1';
            }
            break;
        case 'aweme.detail':
            $link = 'snssdk1128://aweme/detail/' . $params['id'];
            break;
        case 'poi.detail':
            $link = 'snssdk1128://poi/detail?id=' . $params['id'] . '&from=webview&refer=web';
            break;
        case 'music':
            $link = 'snssdk1128://music/detail/' . $params['id'] . '?refer=web';
            break;
        case 'live':
            $link = 'snssdk1128://live?room_id=' . $params['id'] . '&from=webview&refer=web';
            break;
        case 'forward':
            $link = 'snssdk1128://forward/detail/' . $params['id'];
            break;
        case 'challenge':
            $link = 'snssdk1128://challenge/detail/' . $params['id'] . '?refer=web';
            break;
        case 'webview':
            $link = 'snssdk1128://webview?url=' . $params['url'] . '&from=webview&refer=web';
            break;
        case 'webview.fullscreen':
            $link = 'snssdk1128://webview?url=' . $params['url'] . '&from=webview&hide_nav_bar=1&refer=web';
            break;
        case 'home':
            $link = 'snssdk1128://feed?refer=web';
            break;
        case 'billboard.word':
            $link = 'snssdk1128://search/trending';
            break;
        case 'billboard.video':
            $link = 'snssdk1128://search/trending?type=1';
            break;
        case 'billboard.music':
            $link = 'snssdk1128://search/trending?type=2';
            break;
        case 'billboard.positive':
            $link = 'snssdk1128://search/trending?type=3';
            break;
        case 'billboard.star':
            $link = 'snssdk1128://search/trending?type=4';
            break;
        default :
            $link = '';

    }
    return $link;
}

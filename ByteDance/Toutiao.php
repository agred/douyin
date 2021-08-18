<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 头条管理
 * Class Toutiao
 * @package ByteDance
 */
class Toutiao extends BaseApi
{

    /**
     * @title 获取授权码(code) **该URL不是用来请求的, 需要展示给用户用于扫码，在抖音APP支持端内唤醒的版本内打开的话会弹出客户端原生授权页面。
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848834851366275076
     * @param array $scope 应用授权作用域['user_info']
     * @param string $redirect_url 必须以http/https开头
     * @param string $optionalScope
     * @param string $state
     * @return array
     */
    public function authorize($scope, $redirect_url, $optionalScope = '', $state = '')
    {
        $api_url = self::TOUTIAO_API . '/oauth/authorize/';
        $params = [
            'response_type' => 'code',
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_url,
        ];
        if ($state != '') {
            $params['state'] = $state;
        }
        if ($optionalScope != '') {
            $params['optionalScope'] = $optionalScope;
        }
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 获取access_token
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806493387606024
     * @param string $code
     * @return array
     */
    public function access_token($code)
    {
        $api = self::TOUTIAO_API . '/oauth/access_token/';
        $params = [
            'code' => $code,
            'grant_type' => 'authorization_code'
        ];
        return $this->cloud_http_post($api, $params);
    }

    /**
     * @title 刷新refresh_token
     * @Scope renew_refresh_token
     * @url https://open.douyin.com/platform/doc/6848806519174154248
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     * @return array
     */
    public function renew_refresh_token($refresh_token)
    {
        $api_url = self::DOUYIN_API . '/oauth/renew_refresh_token/';
        $params = ['refresh_token' => $refresh_token];
        return $this->cloud_http_post($api_url, $params);
    }

    /**
     * @title 刷新access_token或续期不会改变refresh_token的有效期
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806497707722765
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     * @return array
     */
    public function refresh_token($refresh_token)
    {
        $api = self::TOUTIAO_API . '/oauth/refresh_token/';
        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
        return $this->cloud_http_post($api, $params);
    }

    /**
     * @title 生成client_token
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806493387573256
     * @param string $grant_type 传client_credential
     * @return array
     */
    public function client_token($grant_type)
    {
        $api_url = self::TOUTIAO_API . '/oauth/client_token/';
        $params = ['grant_type' => $grant_type];
        return $this->cloud_http_post($api_url, $params);
    }

}

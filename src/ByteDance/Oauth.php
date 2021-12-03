<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 账号授权
 * Class Oauth
 * @package ByteDance
 */
class Oauth extends BaseApi
{

    /**
     * @title 获取授权码(code) **该URL不是用来请求的, 需要展示给用户用于扫码，在抖音APP支持端内唤醒的版本内打开的话会弹出客户端原生授权页面。
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848834666171009035
     * @param array $scope 应用授权作用域['user_info']
     * @param string $redirect_uri 必须以http/https开头
     * @param string $state
     * @param string $optionalScope
     */
    public function connect($scope, $redirect_uri, $state = "", $optionalScope = "")
    {
        $api_url = self::DOUYIN_API . '/platform/oauth/connect/';
        $params = [
            'response_type' => 'code',
            'scope' => implode(',', $scope),
            'redirect_uri' => $redirect_uri
        ];
        if ($state) {
            $params['state'] = $state;
        }
        if ($optionalScope) {
            $params['optionalScope'] = $optionalScope;
        }
        return $api_url . '?' . http_build_query($params);
    }


    /**
     * @title 获取授权码(code) **抖音静默获取授权码，请求域名为：https://aweme.snssdk.com
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848834666170959883
     * @param string $redirect_uri 必须以http/https开头
     * @param string $state
     */
    public function authorize($redirect_uri, $state = "")
    {
        $api_url = 'https://aweme.snssdk.com/oauth/authorize/v2/';
        $params = [
            'response_type' => 'code',
            'scope' => 'login_id',
            'redirect_uri' => $redirect_uri
        ];
        if ($state) {
            $params['state'] = $state;
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取access_token
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806493387606024
     * @param string $code
     */
    public function access_token($code)
    {
        $api_url = self::DOUYIN_API . '/oauth/access_token/';
        $params = [
            'code' => $code,
            'grant_type' => 'authorization_code'
        ];
        return $this->cloud_https_post($api_url, $params);
    }

    /**
     * @title 刷新refresh_token
     * @Scope renew_refresh_token
     * @url https://open.douyin.com/platform/doc/6848806519174154248
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     */
    public function renew_refresh_token($refresh_token)
    {
        $api_url = self::DOUYIN_API . '/oauth/renew_refresh_token/';
        $params = ['refresh_token' => $refresh_token];
        return $this->cloud_https_post($api_url, $params);
    }

    /**
     * @title 刷新access_token或续期不会改变refresh_token的有效期
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806497707722765
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     */
    public function refresh_token($refresh_token)
    {
        $api_url = self::DOUYIN_API . '/oauth/refresh_token/';
        $params = [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
        return $this->cloud_https_post($api_url, $params);
    }

    /**
     * @title 生成client_token
     * @Scope
     * @url https://open.douyin.com/platform/doc/6848806493387573256
     * @param string $grant_type 传client_credential
     */
    public function client_token($grant_type)
    {
        $api_url = self::DOUYIN_API . '/oauth/client_token/';
        $params = ['grant_type' => $grant_type];
        return $this->cloud_https_post($api_url, $params);
    }

    /**
     * @title 获取jsapi_ticket
     * @Scope js.ticket
     * @url https://open.douyin.com/platform/doc/6848798514798004236
     * @param string $access_token 调用/oauth/client_token/生成的token，此token不需要用户授权。
     */
    public function jsapi_ticket($access_token)
    {
        $api_url = self::DOUYIN_API . '/js/getticket/';
        $params = [
            'access_token' => $access_token
        ];
        return $this->https_get($api_url, $params);
    }

}

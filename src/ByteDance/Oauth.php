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
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/douyin-get-permission-code
     * @param array $scope 应用授权作用域['user_info']
     * @param string $redirect_uri 必须以http/https开头
     * @param string $state
     * @param string $optionalScope
     */
    public function connect($scope, $redirect_uri, $state = "", $optionalScope = "")
    {
        $api = self::API_DY . '/platform/oauth/connect/';
        $params  = [
            'response_type' => 'code',
            'scope'         => implode(',', $scope),
            'redirect_uri'  => $redirect_uri
        ];
        if ($state) {
            $params['state'] = $state;
        }
        if ($optionalScope) {
            $params['optionalScope'] = $optionalScope;
        }
        return $api . '?' . http_build_query($params);
    }


    /**
     * @title 获取授权码(code) **抖音静默获取授权码，请求域名为：https://aweme.snssdk.com
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/douyin-get-permission-code
     * @param string $redirect_uri 必须以http/https开头
     * @param string $state
     */
    public function authorize($redirect_uri, $state = "")
    {
        $api = 'https://aweme.snssdk.com/oauth/authorize/v2/';
        $params  = [
            'response_type' => 'code',
            'scope'         => 'login_id',
            'redirect_uri'  => $redirect_uri
        ];
        if ($state) {
            $params['state'] = $state;
        }
        return $this->get($api, $params);
    }

    /**
     * @title 获取access_token
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/get-access-token
     * @param string $code
     */
    public function access_token($code)
    {
        $api = self::API_DY . '/oauth/access_token/';
        $params  = [
            'code'       => $code,
            'grant_type' => 'authorization_code'
        ];
        return $this->token($api, $params);
    }

    /**
     * @title 刷新access_token或续期不会改变refresh_token的有效期
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/refresh-access-token
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     */
    public function refresh_token($refresh_token)
    {
        $api = self::API_DY . '/oauth/refresh_token/';
        $params  = [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refresh_token
        ];
        return $this->token($api, $params);
    }

    /**
     * @title 刷新refresh_token
     * @Scope renew_refresh_token
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/refresh-token
     * @param string $refresh_token 通过access_token获取到的refresh_token参数
     */
    public function renew_refresh_token($refresh_token)
    {
        $api = self::API_DY . '/oauth/renew_refresh_token/';
        $params  = ['refresh_token' => $refresh_token];
        return $this->token($api, $params);
    }

    /**
     * @title 生成client_token
     * @Scope
     * @url https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/client-token
     */
    public function client_token()
    {
        $api = self::API_DY . '/oauth/client_token/';
        $params  = ['grant_type' => 'client_credential'];
        return $this->token($api, $params);
    }

    /**
     * @title 获取jsapi_ticket
     * @Scope js.ticket
     * @url https://open.douyin.com/platform/doc/6848798514798004236
     * @param string $access_token 调用/oauth/client_token/生成的token，此token不需要用户授权。
     */
    public function jsapi_ticket($access_token)
    {
        $api = self::API_DY . '/js/getticket/';
        $params  = [
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }

    /**
     * @title 获取open_ticket
     * @Scope open.get.ticket
     * @url https://open.douyin.com/platform/doc?doc=docs/openapi/tools-ability/jsb-management/open-ticket
     * @param string $access_token 调用/oauth/client_token/生成的token，此token不需要用户授权。
     */
    public function open_ticket($access_token)
    {
        $api = self::API_DY . '/open/getticket/';
        $params  = [
            'access_token' => $access_token
        ];
        return $this->get($api, $params);
    }
}

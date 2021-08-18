<?php

namespace ByteDance;

use ByteDance\Kernel\BaseApi;

/**
 * 西瓜管理
 * Class Xigua
 * @package ByteDance
 */
class Xigua extends BaseApi
{

    /**
     * @title 获取授权码(code) **该接口同抖音授权接口
     * @Scope
     * @url https://open.douyin.com/platform/doc/6852243568438822925
     * @param array $scope 应用授权作用域['user_info']
     * @param string $redirect_uri 必须以http/https开头
     * @param string $state
     * @param string $optionalScope
     * @return string
     */
    public function connect($scope, $redirect_uri, $state = "", $optionalScope = "")
    {
        $api_url = self::XIGUA_API . '/platform/oauth/connect/';
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

}

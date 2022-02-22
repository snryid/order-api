<?php

namespace FannoShop;

use FannoShop\App as FannoShopApp;

class CommonQueryParam extends FannoShopApp
{
    /**
     * 获取common请求参数
     *
     * @param string $route
     * @param array $params
     * @param string $access_token
     * @return string
     */
    public static function Handle(string $route, array $params)
    {
        $params = array_merge(['app_key' => self::APP_KEY, 'timestamp' => time()], $params);

        $params['sign'] = Sign::Handle($route, $params);

        $params['access_token'] = self::$_AccessToken;

        return http_build_query($params);
    }
}
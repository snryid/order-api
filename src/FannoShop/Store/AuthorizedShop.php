<?php

namespace FannoShop\Store;

use Client;
use FannoShop\App;
use FannoShop\CommonQueryParam;

class AuthorizedShop extends App
{
    /**
     * 获取授权店铺
     *
     * @return string
     */
    public function getAuthorizedShop()
    {
        $route = '/api/shop/get_authorized_shop';

        $url = self::APP_DOMAIN . $route . '?' . CommonQueryParam::Handle($route, []);

        return Client::send($url, 'GET');
    }
}
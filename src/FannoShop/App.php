<?php

namespace FannoShop;

class App
{
    const APP_KEY = 'xxxx';

    const APP_SECRET = 'xxxx';

    const APP_DOMAIN = 'https://open-api.fannoshop.com';

    protected static $_AccessToken;

    protected static $_ShopId;

    public function __construct($access_token = '', $shop_id = 0)
    {
        self::$_AccessToken = $access_token;
        self::$_ShopId = $shop_id;
    }
}

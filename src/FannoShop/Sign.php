<?php

namespace FannoShop;

use FannoShop\App as FannoShopApp;

class Sign extends FannoShopApp
{
    public static function Handle(string $route, array $signOptions): string
    {
        ksort($signOptions);

        $input = '';
        foreach ($signOptions as $k => $v) {
            $input .= $k . $v;
        }

        $content = self::APP_SECRET . $route . $input . self::APP_SECRET;

        return hash_hmac('sha256', $content, self::APP_SECRET);
    }
}

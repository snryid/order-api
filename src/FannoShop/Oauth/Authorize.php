<?php

namespace FannoShop\Oauth;

use FannoShop\App;
use Client;

class Authorize extends App
{
    /**
     * 跳转登录
     *
     * @param string $store_name
     * @return void
     */
    public static function jumpLogin(string $store_name, string $redirect_url = '')
    {
        $jump_url = 'https://auth.fannoshop.com/oauth/authorize?app_key=' . self::APP_KEY . '&state=' . base64_encode($store_name) . '&redirect_url=' . $redirect_url;

        header("location: {$jump_url}");
    }

    /**
     * 获取token
     *
     * @param string $code
     * @return string
     */
    public function getAccessTokenByCode(string $code)
    {
        $url = 'https://auth.fannoshop.com/api/token/getAccessToken';

        $params = [
            'app_key' => self::APP_KEY,
            'app_secret' => self::APP_SECRET,
            'auth_code' => $code,
            'grant_type' => 'authorized_code',
        ];

        $url .= '?' . http_build_query($params);

        return Client::send($url, 'POST', '');
    }

    /**
     * 刷新token
     *
     * @param string $refreshToken
     * @return string
     */
    public function getRefreshToken(string $refreshToken)
    {
        $url = 'https://auth.fannoshop.com/api/token/refreshToken';

        $params = [
            'app_key' => self::APP_KEY,
            'app_secret' => self::APP_SECRET,
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token',
        ];

        $url .= '?' . http_build_query($params);

        return Client::send($url, 'POST', '');
    }
}

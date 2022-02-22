<?php

namespace FannoShop\Order;

use Client;
use FannoShop\App;
use FannoShop\CommonQueryParam;

class ShipOrder extends App
{
    /**
     * 标发货,只适用于线下标发货
     *
     * @param string $order_id
     * @param string $tracking_number
     * @param string $shipping_provider_id //先不用传
     * @return string
     */
    public function shipOrder(string $order_id, string $tracking_number, $shipping_provider_id = '')
    {
        $body = [
            'order_id' => $order_id,
            'pick_up' => [
                'self_shipment' => [
                    'tracking_number' => $tracking_number,
                    // 'shipping_provider_id' => $shipping_provider_id
                ]
            ]
        ];

        $route = '/api/order/rts';

        $url = self::APP_DOMAIN . $route . '?' . CommonQueryParam::Handle($route, ['shop_id' => $this->_ShopId]);

        $headers = ['Content-Type: application/json;charset=UTF-8'];

        return Client::send($url, 'POST', json_encode($body), $headers);
    }
}
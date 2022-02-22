<?php
namespace FannoShop\Order;

use Client;
use FannoShop\App;
use FannoShop\CommonQueryParam;

class Order extends App
{
    /**
     * 搜索订单
     *
     * @param string $time_type
     * @param integer $start_time
     * @param integer $end_time
     * @param integer $order_status
     * @param integer $page_size
     * @param integer $sort_type
     * @return string
     */
    public function getOrderSearch(
        $time_type = 'create',
        int $start_time,
        int $end_time,
        int $order_status,
        $page_size = 50,
        $sort_type = 2
    ) {

        $body = [
            'create_time_from' => $start_time,
            'create_time_to' => $end_time,
            'order_status' => $order_status,
            'sort_by' => 'CREATE_TIME',
            'sort_type' => $sort_type,
            'page_size' => $page_size,
        ];

        if ($time_type == 'update') {
            $body['update_time_from'] = $start_time;
            $body['update_time_to'] = $end_time;

            unset($body['create_time_from'], $body['create_time_to']);
        }

        $route = '/api/orders/search';

        $url = self::APP_DOMAIN . $route . '?' . CommonQueryParam::Handle($route, ['shop_id' => $this->_ShopId]);

        $headers = ['Content-Type: application/json;charset=UTF-8'];

        return Client::send($url, 'POST', json_encode($body), $headers);
    }

    /**
     * 获取订单明细
     *
     * @param array $order_id_list
     * @return string
     */
    public function getOrderDetail(array $order_id_list)
    {
        $body = ['order_id_list' => $order_id_list];

        $route = '/api/orders/detail/query';

        $url = self::APP_DOMAIN . $route . '?' . CommonQueryParam::Handle($route, ['shop_id' => $this->_ShopId]);

        $headers = ['Content-Type: application/json;charset=UTF-8'];

        return Client::send($url, 'POST', json_encode($body), $headers);
    }
}

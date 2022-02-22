<?php

namespace JuheOa;

use Client;

class StoreList
{
    public function getStoreList()
    {
        $url = "http://qa-oa.izehui.com/server/api/v1/shop/get-shops?token=xxxx&key=";

        $resful = Client::send($url);

        var_export($resful);
    }
}



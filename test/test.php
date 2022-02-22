<?php

include __DIR__ . '/../autoloader.php';

// $token = '';
// $shop_id = 0;

// $Authorize = new FannoShop\Oauth\Authorize();
// // $res = $Authorize::jumpLogin('test', 'app.php');

// $res = $Authorize->getAccessTokenByCode('demo');

// var_dump($res);

$StoreList = new JuheOa\StoreList;

$StoreList ->getStoreList();




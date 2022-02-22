<?php

class Client
{
    public static function send(string $url, $type = 'GET', $data = '', $headers = [])
    {
        $curl = curl_init();
        $setOption = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HEADER => 0,
            CURLOPT_AUTOREFERER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_TIMEOUT => 120,
        );
        if ('GET' === $type) {
            $setOption[CURLOPT_HTTPGET] = true;
        }
        if ('POST' === $type) {
            $setOption[CURLOPT_POST] = true;
            $setOption[CURLOPT_POSTFIELDS] = $data;
        }
        if ($headers) {
            $setOption[CURLOPT_HTTPHEADER] = $headers;
        }

        curl_setopt_array($curl, $setOption);
        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new \ErrorException($error, 20010);
        }

        return $response;
    }
}



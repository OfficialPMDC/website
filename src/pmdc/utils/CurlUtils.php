<?php

namespace pmdc\utils;

class CurlUtils {

    /**
     * @param string    $url
     * @param string... $headers
     */
    public static function curlGet(string $url, ...$headers) {
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }
}

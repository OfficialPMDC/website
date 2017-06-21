<?php

namespace pmdc\utils;

class CurlUtils {

    /**
     * @param string    $url
     * @param string... $headers
     */
    public static function post(string $url, array $fields, ...$headers) {
        $curl = curl_init();
       
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
        
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
    
    public static function ghApiGet(string $url, string $token, array $headers = ["Accept: application/vnd.github.v3+json"]) {
        $curl = curl_init();
        
        $headers[] = "User-Agent: PMDC/1.0";
        $headers[] = "Authorization: bearer $token";
       
        curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_URL, "https://api.github.com" . $url);
        
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}

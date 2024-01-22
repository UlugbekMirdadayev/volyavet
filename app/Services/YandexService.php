<?php

namespace App\Services;

class YandexService
{
    function get_request_result($request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request);


        /*Храним сеанс в сессии*/
        curl_setopt($ch, CURLOPT_COOKIEFILE, true);
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookiefile");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookiefile");
        /**/

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);

        curl_close($ch);

        return json_decode($server_output);
    }

}

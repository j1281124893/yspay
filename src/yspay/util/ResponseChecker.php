<?php


namespace Yspay\SDK\Kernel\Gathering\Util;


class ResponseChecker
{
    public function success($response)
    {
        if (!empty($response->response['code']) && $response->response['code'] == "10000") {
            return true;
        }

        return false;
    }
}
<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class DfBillDownloadurlGetRequest
{

    /**
     * 商户生成的订单号
     */
    public $account_date;


    /**
     * 代理密码，加密传输
     */
    public $proxy_password;



    /**
     * 真实商户用户号
     */
    public $merchant_usercode;






    public static function getParam($model)
    {

        $param = array(
            'account_date' => $model->account_date,
            'proxy_password' => $model->proxy_password,
            'merchant_usercode' => $model->merchant_usercode,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'dfBillDownloadurlGetRequest' => [
                'account_date' => [
                    Validator::MAX_LEN => 10,
                ],


            ],

        );

        return $checkRules['dfBillDownloadurlGetRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "account_date" => $model->account_date,
        );

        return $bizReqJson;
    }
}
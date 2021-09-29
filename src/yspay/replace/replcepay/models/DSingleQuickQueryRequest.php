<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class DSingleQuickQueryRequest
{

    /**
     * 商户生成的订单号
     */
    public $out_trade_no;

    /**
     * 商户日期
     */
    public $shopdate;



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
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'proxy_password' => $model->proxy_password,
            'merchant_usercode' => $model->merchant_usercode,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'dSingleQuickQueryRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],

            ],

        );

        return $checkRules['dSingleQuickQueryRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
        );

        return $bizReqJson;
    }
}
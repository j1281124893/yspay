<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class MerchantBalanceQueryRequest
{

    /**
     * 商户号
     */
    public $merchant_usercode;





    public static function getParam($model)
    {

        $param = array(
            'merchant_usercode' => $model->merchant_usercode,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantBalanceQueryRequest' => [

            ],

        );

        return $checkRules['merchantBalanceQueryRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "merchant_usercode" => $model->merchant_usercode,
        );

        return $bizReqJson;
    }
}
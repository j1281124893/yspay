<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class MerchantWithdrawQueryRequest
{

    /**
     * 商户生成的订单号
     */
    public $out_trade_no;

    /**
     * 商户日期
     */
    public $shopdate;





    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantWithdrawQueryRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],

            ],

        );

        return $checkRules['merchantWithdrawQueryRequest'];
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
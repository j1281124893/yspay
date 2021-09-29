<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;


class TradeDeliveredRequest
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
     * 该交易在银盛支付系统中的交易流水号
     */
    public $trade_no;






    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'trade_no' => $model->trade_no,


        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'cupgetmulappUseridRequest' => [

                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],



            ],

        );

        return $checkRules['cupgetmulappUseridRequest'];
    }


    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
            "trade_no" => $model->trade_no,
        );

        return $bizReqJson;
    }
}
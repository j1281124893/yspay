<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class TradeOrderQueryRequest
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
     * 银盛交易号
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
            'tradeOrderQueryRequest' => [
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],


            ],

        );

        return $checkRules['tradeOrderQueryRequest'];
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
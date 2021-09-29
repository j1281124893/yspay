<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class TradeRefundQueryRequest
{

    /**
     * 商户生成的订单号
     */
    public $out_trade_no;

    /**
     * 订单支付时传入的商户订单号
     */
    public $out_request_no;

    /**
     * 银盛交易号
     */
    public $trade_no;


    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'out_request_no' => $model->out_request_no,
            'trade_no' => $model->trade_no,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'tradeRefundQueryRequest' => [
                'out_request_no' => [
                    Validator::MAX_LEN => 32,
                ],

            ],

        );

        return $checkRules['tradeRefundQueryRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "out_request_no" => $model->out_request_no,
            "trade_no" => $model->trade_no,
        );

        return $bizReqJson;
    }
}
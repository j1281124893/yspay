<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class TradeRefundRequest
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

    /**
     * 需要退款的金额
     */
    public $refund_amount;

    /**
     * 退款的原因说明
     */
    public $refund_reason;

    /**
     * 标识一次退款请求
     */
    public $out_request_no;







    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'trade_no' => $model->trade_no,
            'refund_amount' => $model->refund_amount,
            'refund_reason' => $model->refund_reason,
            'out_request_no' => $model->out_request_no,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'tradeRefundRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],
                'refund_amount' => [
                ],
                'refund_reason' => [
                    Validator::MAX_LEN => 50,
                ],
                'out_request_no' => [
                    Validator::MAX_LEN => 32,
                ],



            ],

        );

        return $checkRules['tradeRefundRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
            "trade_no" => $model->trade_no,
            "refund_amount" => $model->refund_amount,
            "refund_reason" => $model->refund_reason,
            "out_request_no" => $model->out_request_no,
        );

        return $bizReqJson;
    }
}
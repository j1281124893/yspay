<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class TradeRefundSplitRequest
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

    /**
     * 原交易是否参与分账（01或空代表是，02代表否）
     */
    public $is_division;

    /**
     * 退款分账明细
     */
    public $refund_split_info;

    /**
     * 原交易分账模式（01：比例，02：金额）
     */
    public $ori_division_mode;

    /**
     * 原订单交易分帐信息
     */
    public $order_div_list;









    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'trade_no' => $model->trade_no,
            'refund_amount' => $model->refund_amount,
            'refund_reason' => $model->refund_reason,
            'out_request_no' => $model->out_request_no,
            'is_division' => $model->is_division,
            'refund_split_info' => $model->refund_split_info,
            'ori_division_mode' => $model->ori_division_mode,
            'order_div_list' => $model->order_div_list,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'tradeRefundSplitRequest' => [
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

        return $checkRules['tradeRefundSplitRequest'];
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
            "is_division" => $model->is_division,
            "refund_split_info" => $model->refund_split_info,
            "ori_division_mode" => $model->ori_division_mode,
            "order_div_list" => $model->order_div_list,

        );

        return $bizReqJson;
    }
}
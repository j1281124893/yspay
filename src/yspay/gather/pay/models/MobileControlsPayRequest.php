<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;


class MobileControlsPayRequest
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
     * 商品的标题
     */
    public $subject;

    /**
     * 该笔订单的资金总额
     */
    public $total_amount;

    /**
     * 支持币种
     */
    public $currency;

    /**
     * 收款方银盛支付用户号
     */
    public $seller_id;
    /**
     * 收款方银盛支付客户名
     */
    public $seller_name;
    /**
     * 设置未付款交易的超时时间
     */
    public $timeout_express;
    /**
     * 业务扩展参数
     */
    public $extend_params;
    /**
     * 公用回传参数
     */
    public $extra_common_param;
    /**
     * 业务代码
     */
    public $business_code;
    /**
     * 指定中国银联
     */
    public $bank_type;

    /**
     * 付款方银行账户类型， corporate :对公账户;personal:对私账户
     */
    public $bank_account_type;

    /**
     * 支持卡类型, debit:借记卡;credit:信用卡
     */
    public $support_card_type;

    /**
     * 跨境支付付款人信息json格式
     */
    public $cross_border_info;


    /**
     * 收货人信息json格式
     */
    public $consignee_info;


    /**
     * 同步地址
     */
    public $return_url;










    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'subject' => $model->subject,
            'total_amount' => $model->total_amount,
            'currency' => $model->currency,
            'seller_id' => $model->seller_id,
            'seller_name' => $model->seller_name,
            'timeout_express' => $model->timeout_express,
            'extend_params' => $model->extend_params,
            'extra_common_param' => $model->extra_common_param,
            'business_code' => $model->business_code,
            'bank_type' => $model->bank_type,
            'bank_account_type' => $model->bank_account_type,
            'support_card_type' => $model->support_card_type,
            'cross_border_info' => $model->cross_border_info,
            'consignee_info' => $model->consignee_info,
            'return_url' => $model->return_url,



        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'mobileControlsPayRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],
                'subject' => [
                    Validator::MAX_LEN => 250,
                ],
                'total_amount' => [
                ],
                'seller_id' => [
                    Validator::MAX_LEN => 20,
                ],
                'seller_name' => [
                    Validator::MAX_LEN => 50,
                ],
                'timeout_express' => [
                    Validator::MAX_LEN => 6,
                ],
                'bank_account_type' => [
                    Validator::MAX_LEN => 9,
                ],
                'support_card_type' => [
                    Validator::MAX_LEN => 6,
                ],


            ],

        );

        return $checkRules['mobileControlsPayRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
            "subject" => $model->subject,
            "total_amount" => $model->total_amount,
            "currency" => $model->currency,
            "seller_id" => $model->seller_id,
            "seller_name" => $model->seller_name,
            "timeout_express" => $model->timeout_express,
            "extend_params" => $model->extend_params,
            "extra_common_param" => $model->extra_common_param,
            "business_code" => $model->business_code,
            "bank_type" => $model->bank_type,
            "bank_account_type" => $model->bank_account_type,
            "support_card_type" => $model->support_card_type,
            "cross_border_info" => $model->cross_border_info,
            "consignee_info" => $model->consignee_info,

        );

        return $bizReqJson;
    }
}
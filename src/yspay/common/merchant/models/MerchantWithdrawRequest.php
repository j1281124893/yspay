<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class MerchantWithdrawRequest
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
     * 暂时只支持币种：CNY（人民币）
     */
    public $currency;

    /**
     * 商户号
     */
    public $merchant_usercode;

    /**
     * 提现的总金额。单位为：RMB Yuan。取值范围为[0.01，99999999.99]
     */
    public $total_amount;

    /**
     * 退款的原因说明
     */
    public $subject;

    /**
     * 银行帐号
     */
    public $bank_account_no;







    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'currency' => $model->currency,
            'merchant_usercode' => $model->merchant_usercode,
            'total_amount' => $model->total_amount,
            'subject' => $model->subject,
            'bank_account_no' => $model->bank_account_no,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantWithdrawRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],
                'currency' => [
                    Validator::MAX_LEN => 3,
                ],

                'total_amount' => [
                ],
                'subject' => [
                    Validator::MAX_LEN => 500,
                ],

            ],

        );

        return $checkRules['merchantWithdrawRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
            "currency" => $model->currency,
            "merchant_usercode" => $model->merchant_usercode,
            "total_amount" => $model->total_amount,
            "subject" => $model->subject,
            "bank_account_no" => $model->bank_account_no,
        );

        return $bizReqJson;
    }
}
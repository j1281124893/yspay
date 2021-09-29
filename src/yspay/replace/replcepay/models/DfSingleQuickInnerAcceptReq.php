<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class DfSingleQuickInnerAcceptReq
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
     * 该笔订单的资金总额
     */
    public $total_amount;

    /**
     * 支持币种
     */
    public $currency;


    /**
     * 业务代码
     */
    public $business_code;

    /**
     * 订单说明
     */
    public $subject;

    /**
     * 收款方银盛客户名
     */
    public $payee_cust_name;
    /**
     * 收款方银盛用户号
     */
    public $payee_user_code;
    /**
     * 交易成功下发短信的号码
     */
    public $telephone_no;

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
            'total_amount' => $model->total_amount,
            'currency' => $model->currency,
            'business_code' => $model->business_code,
            'subject' => $model->subject,
            'payee_cust_name' => $model->payee_cust_name,
            'payee_user_code' => $model->payee_user_code,
            'telephone_no' => $model->telephone_no,
            'proxy_password' => $model->proxy_password,
            'merchant_usercode' => $model->merchant_usercode,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'dfSingleQuickInnerAcceptReq' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],
                'subject' => [
                    Validator::MAX_LEN => 500,
                ],
                'business_code' => [
                    Validator::MAX_LEN => 10,
                ],
                'total_amount' => [
                ],
                'payee_user_code' => [
                    Validator::MAX_LEN => 20,
                ],
                'payee_cust_name' => [
                    Validator::MAX_LEN => 50,
                ],
                'telephone_no' => [
                    Validator::MAX_LEN => 11,
                ],



            ],

        );

        return $checkRules['dfSingleQuickInnerAcceptReq'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
            "total_amount" => $model->total_amount,
            "currency" => $model->currency,
            "business_code" => $model->business_code,
            "subject" => $model->subject,
            "payee_cust_name" => $model->payee_cust_name,
            "payee_user_code" => $model->payee_user_code,
            "telephone_no" => $model->telephone_no,
            "proxy_password" => $model->proxy_password,
            "merchant_usercode" => $model->merchant_usercode,

        );

        return $bizReqJson;
    }
}
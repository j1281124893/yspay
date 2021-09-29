<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class DfSingleQuickAcceptRequest
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
     * 开户行所在城市
     */
    public $bank_city;
    /**
     * 开户行所在省份
     */
    public $bank_province;


    /**
     * 业务代码
     */
    public $business_code;

    /**
     * 订单说明
     */
    public $subject;

    /**
     * 银行名称
     */
    public $bank_name;
    /**
     * 银行帐号用户名
     */
    public $bank_account_name;
    /**
     * 支持卡类型
     */
    public $bank_card_type;
    /**
     * 银行预留手机号码
     */
    public $bank_telephone_no;
    /**
     * 付款方银行账户类型
     */
    public $bank_account_type;

    /**
     * 银行帐号
     */
    public $bank_account_no;

    /**
     * 收款方证件类型00：身份证，19：营业执照 ，
     */
    public $cert_type;

    /**
     * 收款方证件号码
     */
    public $cert_no;

    /**
     * 收款方证件有效期，格式yyyyMMdd
     */
    public $cert_expire;



    /**
     * 收货人信息json格式
     */
    public $consignee_info;



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
            'bank_city' => $model->bank_city,
            'bank_province' => $model->bank_province,
            'business_code' => $model->business_code,
            'subject' => $model->subject,
            'bank_name' => $model->bank_name,
            'bank_account_name' => $model->bank_account_name,
            'bank_card_type' => $model->bank_card_type,
            'bank_telephone_no' => $model->bank_telephone_no,
            'bank_account_type' => $model->bank_account_type,
            'bank_account_no' => $model->bank_account_no,
            'cert_type' => $model->cert_type,
            'cert_no' => $model->cert_no,
            'cert_expire' => $model->cert_expire,
            'consignee_info' => $model->consignee_info,
            'proxy_password' => $model->proxy_password,
            'merchant_usercode' => $model->merchant_usercode,


        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'directpayCreatebyuserRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
                'shopdate' => [
                    Validator::MAX_LEN => 8,
                ],
                'subject' => [
                    Validator::MAX_LEN => 500,
                ],
                'total_amount' => [
                ],
                'currency' => [
                    Validator::MAX_LEN => 3,
                ],
                'bank_name' => [
                    Validator::MAX_LEN => 128,
                ],
                'bank_city' => [
                    Validator::MAX_LEN => 40,
                ],
                'bank_province' => [
                    Validator::MAX_LEN => 40,
                ],
                'bank_account_no' => [
                    Validator::MAX_LEN => 23,
                ],
                'bank_account_name' => [
                    Validator::MAX_LEN => 100,
                ],
                'bank_account_type' => [
                    Validator::MAX_LEN => 9,
                ],
                'bank_card_type' => [
                    Validator::MAX_LEN => 6,
                ],


            ],

        );

        return $checkRules['directpayCreatebyuserRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "shopdate" => $model->shopdate,
            "total_amount" => $model->total_amount,
            "currency" => $model->currency,
            "bank_city" => $model->bank_city,
            "bank_province" => $model->bank_province,
            "business_code" => $model->business_code,
            "subject" => $model->subject,
            "bank_name" => $model->bank_name,
            "bank_account_name" => $model->bank_account_name,
            "bank_card_type" => $model->bank_card_type,
            "bank_telephone_no" => $model->bank_telephone_no,
            "bank_account_type" => $model->bank_account_type,
            "bank_account_no" => $model->bank_account_no,
            "cert_type" => $model->cert_type,
            "cert_no" => DfSingleQuickAcceptRequest::encryptDes($model->cert_no, $kernel->partner_id),
            "cert_expire" => $model->cert_expire,
            "consignee_info" => $model->consignee_info,
            "proxy_password" => $model->proxy_password,
            "merchant_usercode" => $model->merchant_usercode,

        );

        return $bizReqJson;
    }

    /**
     * des加密函数
     */
    public static function encryptDes($input, $key)
    {
        if (!isset($input) || !isset($key)) {
            return "";
        }
        $key = substr($key, 0, 8);
        if (iconv_strlen($key,"UTF-8") < 8) {
            $key = sprintf("%+8s", $key);
        }

        $data = openssl_encrypt($input, 'DES-ECB', $key, OPENSSL_RAW_DATA, "");
        $data = base64_encode($data);
        return $data;
    }
}
<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class TrusteeshipfastPayRequest
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
     * 银盛协议号,签约时返回的银盛协议号
     */
    public $protocol_no;

    /**
     * 贷记卡必填
     */
    public $cardCvn2;
    /**
     * 贷记卡必填
     */
    public $cardExprDt;


    /**
     * 收货人信息json格式
     */
    public $consignee_info;


    /**
     * 唯一客户标识，商户旗下客户号。签约时的user_id
     */
    public $user_id;

    /**
     * 订单所属省编号（省市编号必须同时为空或者同时非空、并且需要符合层级关系）
     */
    public $province;

    /**
     * 订单所属市编号（省市编号必须同时为空或者同时非空、并且需要符合层级关系）
     */
    public $city;

    /**
     * Mcc码
     */
    public $mccs;
    /**
     * 第三方商户号
     */
    public $mer_no;

    /**
     * 同步通知地址
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
            'protocol_no' => $model->protocol_no,
            'cardCvn2' => $model->cardCvn2,
            'cardExprDt' => $model->cardExprDt,
            'consignee_info' => $model->consignee_info,
            'user_id' => $model->user_id,
            'province' => $model->province,
            'city' => $model->city,
            'mccs' => $model->mccs,
            'mer_no' => $model->mer_no,
            'return_url' => $model->return_url,


        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'trusteeshipfastPayRequest' => [
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
                'business_code' => [
                    Validator::MAX_LEN => 10,
                ],
                'user_id' => [
                    Validator::MAX_LEN => 25,
                ],
                'protocol_no' => [
                    Validator::MAX_LEN => 20,
                ],



            ],

        );

        return $checkRules['trusteeshipfastPayRequest'];
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
            "protocol_no" => $model->protocol_no,
            "cardCvn2" => TrusteeshipfastPayRequest::encryptDes($model->cardCvn2,$kernel->partner_id),
            "cardExprDt" => TrusteeshipfastPayRequest::encryptDes($model->cardExprDt,$kernel->partner_id),
            "consignee_info" => $model->consignee_info,
            "user_id" => $model->user_id,
            "province" => $model->province,
            "city" => $model->city,
            "mccs" => $model->mccs,
            "mer_no" => $model->mer_no,

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
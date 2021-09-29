<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class TrusteeshipSignRequest
{

    /**
     * 商户生成的订单号
     */
    public $out_trade_no;


    /**
     * 收款方银盛支付用户号
     */
    public $seller_id;
    /**
     * 收款方银盛支付客户名
     */
    public $seller_name;

    /**
     * 该笔订单的资金总额，单位为RMB-Yuan
     */
    public $total_amount;


    /**
     * 付款方银行姓名
     */
    public $buyer_name;
    /**
     * 付款方银行账号
     */
    public $buyer_card_number;
    /**
     * 付款方银行绑定手机号码
     */
    public $buyer_mobile;
    /**
     * 贷记卡必填，cvv，使用DES加密，密钥为商户号前8位，不足8位在商户号前补空格
     */
    public $cardCvn2;


    /**
     * 贷记卡必填
     */
    public $cardExprDt;

    /**
     * 证件号码
     */
    public $pyerIDNo;


    /**
     * 证件号码
     */
    public $imei;


    /**
     * 支付作用范围
     *  01：发起方 + 收款方 + 商户旗下客户 + 持卡人(四要素) , 默认
     *  02：发起方 + 商户旗下客户 + 持卡人(四要素)
     */
    public $actionScope;


    /**
     * 唯一客户标识，商户旗下客户号
     */
    public $user_id;




    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'seller_id' => $model->seller_id,
            'seller_name' => $model->seller_name,
            'total_amount' => $model->total_amount,
            'buyer_name' => $model->buyer_name,
            'buyer_card_number' => $model->buyer_card_number,
            'buyer_mobile' => $model->buyer_mobile,
            'cardCvn2' => $model->cardCvn2,
            'cardExprDt' => $model->cardExprDt,
            'pyerIDNo' => $model->pyerIDNo,
            'imei' => $model->imei,
            'actionScope' => $model->actionScope,
            'user_id' => $model->user_id,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'trusteeshipSignRequest' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],

                'total_amount' => [
                ],
                'seller_id' => [
                    Validator::MAX_LEN => 20,
                ],
                'seller_name' => [
                    Validator::MAX_LEN => 50,
                ],

                'buyer_card_number' => [
                    Validator::MAX_LEN => 32,
                ],
                'buyer_mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'buyer_name' => [
                    Validator::MAX_LEN => 50,
                ],

                'pyerIDNo' => [
                    Validator::MAX_LEN => 18,
                ],
                'user_id' => [
                    Validator::MAX_LEN => 25,
                ],


            ],

        );

        return $checkRules['trusteeshipSignRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,
            "seller_id" => $model->seller_id,
            "seller_name" => $model->seller_name,
            "total_amount" => $model->total_amount,
            "buyer_name" => TrusteeshipSignRequest::encryptDes($model->buyer_name,$kernel->partner_id),
            "buyer_card_number" => TrusteeshipSignRequest::encryptDes($model->buyer_card_number,$kernel->partner_id),
            "buyer_mobile" => TrusteeshipSignRequest::encryptDes($model->buyer_mobile,$kernel->partner_id),
            "cardCvn2" => TrusteeshipSignRequest::encryptDes($model->cardCvn2,$kernel->partner_id),
            "cardExprDt" => TrusteeshipSignRequest::encryptDes($model->cardExprDt,$kernel->partner_id),
            "pyerIDNo" => TrusteeshipSignRequest::encryptDes($model->pyerIDNo,$kernel->partner_id),
            "imei" => $model->imei,
            "actionScope" => $model->actionScope,
            "user_id" => $model->user_id,

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
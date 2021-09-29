<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class FastpayRequest
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
     * 确定快捷支付银行
     */
    public $bank_type;
    /**
     * 付款方银行账户类型
     */
    public $bank_account_type;
    /**
     * 支持卡类型
     */
    public $support_card_type;
    /**
     * 付款方支付卡所对应的银行名称
     */
    public $bank_name;
    /**
     * 贷记卡必填
     */
    public $cardCvn2;
    /**
     * 贷记卡必填
     */
    public $cardExprDt;
    /**
     * 证件类型
     */
    public $pyerIDTp;
    /**
     * 证件号码
     */
    public $pyerIDNo;

    /**
     * 收货人信息json格式
     */
    public $consignee_info;

    /**
     * 跨境支付付款人信息json格式，当收款方商户为跨境商户时，此域所有字段必填。
     */
    public $cross_border_info;


    /**
     * 订单所属省编号（省市编号必须同时为空或者同时非空、并且需要符合层级关系）
     */
    public $province;

    /**
     * 订单所属市编号（省市编号必须同时为空或者同时非空、并且需要符合层级关系）
     */
    public $city;

    /**
     * 是否限制信用卡。值为1表示禁用信用卡，0或为空表示不限制
     */
    public $limit_credit_pay;


    /**
     * Mcc码
     */
    public $mccs;
    /**
     * 第三方商户号
     */
    public $mer_no;





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
            'buyer_name' => $model->buyer_name,
            'buyer_card_number' => $model->buyer_card_number,
            'buyer_mobile' => $model->buyer_mobile,
            'bank_type' => $model->bank_type,
            'bank_account_type' => $model->bank_account_type,
            'support_card_type' => $model->support_card_type,
            'bank_name' => $model->bank_name,
            'cardCvn2' => $model->cardCvn2,
            'cardExprDt' => $model->cardExprDt,
            'pyerIDTp' => $model->pyerIDTp,
            'pyerIDNo' => $model->pyerIDNo,
            'consignee_info' => $model->consignee_info,
            'cross_border_info' => $model->cross_border_info,
            'province' => $model->province,
            'city' => $model->city,
            'limit_credit_pay' => $model->limit_credit_pay,
            'mccs' => $model->mccs,
            'mer_no' => $model->mer_no,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'barcodepayRequest' => [
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
                'bank_type' => [
                    Validator::MAX_LEN => 9,
                ],
                'buyer_card_number' => [
                    Validator::MAX_LEN => 32,
                ],
                'buyer_mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'bank_account_type' => [
                    Validator::MAX_LEN => 9,
                ],
                'support_card_type' => [
                    Validator::MAX_LEN => 6,
                ],
                'bank_name' => [
                    Validator::MAX_LEN => 128,
                ],
                'pyerIDTp' => [
                    Validator::MAX_LEN => 2,
                ],
                'pyerIDNo' => [
                    Validator::MAX_LEN => 18,
                ],


            ],

        );

        return $checkRules['barcodepayRequest'];
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
            "buyer_name" => $model->buyer_name,
            "buyer_card_number" => $model->buyer_card_number,
            "buyer_mobile" => $model->buyer_mobile,
            "bank_type" => $model->bank_type,
            "bank_account_type" => $model->bank_account_type,
            "support_card_type" => $model->support_card_type,
            "bank_name" => $model->bank_name,
            "cardCvn2" => FastpayRequest::encryptDes($model->cardCvn2,$kernel->partner_id),
            "cardExprDt" => FastpayRequest::encryptDes($model->cardExprDt,$kernel->partner_id),
            "pyerIDTp" => FastpayRequest::encryptDes($model->pyerIDTp,$kernel->partner_id),
            "pyerIDNo" => FastpayRequest::encryptDes($model->pyerIDNo,$kernel->partner_id),
            "consignee_info" => $model->consignee_info,
            "cross_border_info" => $model->cross_border_info,
            "province" => $model->province,
            "city" => $model->city,
            "limit_credit_pay" => $model->limit_credit_pay,
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
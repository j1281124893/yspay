<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class WapDirectpayCreatebyuserReq
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
     * 直连银行信息,直联模式使用,锁定指定的支付方式，目前支持
     * internetbank：网银
     * fastpay：快捷
     * native: 原生app支付
     * fdfastpay:wap前台快捷支付
     */
    public $pay_mode;

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
     * 卡号，当pay_mode为fastpay时必填
     */
    public $bank_account_no;
    /**
     * 姓名，当pay_mode为fastpay时必填
     */
    public $fast_pay_name;
    /**
     * 证件号，当pay_mode为fastpay时必填
     */
    public $fast_pay_id_no;
    /**
     * 有效期，当pay_mode为fastpay时，且卡类型为信用卡时必填
     */
    public $fast_pay_validity;
    /**
     * 手机号,当pay_mode为fastpay时使用
     */
    public $fast_pay_mobile;
    /**
     * 安全码,当pay_mode为fastpay时，且卡类型为信用卡时必填
     */
    public $fast_pay_cvv2;


    /**
     * 同步地址
     */
    public $return_url;

    /**
     * 交易类型，说明：1或者空：即时到账，2：担保交易
     */
    public $tran_type;







    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
            'shopdate' => $model->shopdate,
            'subject' => $model->subject,
            'total_amount' => $model->total_amount,
            'seller_id' => $model->seller_id,
            'seller_name' => $model->seller_name,
            'timeout_express' => $model->timeout_express,
            'extend_params' => $model->extend_params,
            'extra_common_param' => $model->extra_common_param,
            'business_code' => $model->business_code,
            'pay_mode' => $model->pay_mode,
            'bank_type' => $model->bank_type,
            'bank_account_type' => $model->bank_account_type,
            'support_card_type' => $model->support_card_type,
            'bank_account_no' => $model->bank_account_no,
            'fast_pay_name' => $model->fast_pay_name,
            'fast_pay_id_no' => $model->fast_pay_id_no,
            'fast_pay_validity' => $model->fast_pay_validity,
            'fast_pay_mobile' => $model->fast_pay_mobile,
            'fast_pay_cvv2' => $model->fast_pay_cvv2,
            'return_url' => $model->return_url,
            'tran_type' => $model->tran_type,



        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'wapDirectpayCreatebyuserReq' => [
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


            ],

        );

        return $checkRules['wapDirectpayCreatebyuserReq'];
    }


}
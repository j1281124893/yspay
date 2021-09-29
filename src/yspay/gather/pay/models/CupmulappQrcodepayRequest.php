<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class CupmulappQrcodepayRequest
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
     * 必须传正确的用户端ip
     */
    public $spbill_create_ip;

    /**
     * 行别，银联扫码-9001002
     */
    public $bank_type;


    /**
     * 收货人信息json格式
     */
    public $consignee_info;

    /**
     * 用户标识
     */
    public $userId;
    /**
     * 终端号
     */
    public $device_info;
    /**
     * 终端信息
     */
    public $terminal_info;


    /**
     * 是否限制信用卡。值为1表示禁用信用卡，0或为空表示不限制
     */
    public $limit_credit_pay;

    /**
     * 是否允许多次支付,Y：允许;N：不允许
     */
    public $allow_repeat_pay;

    /**
     * 失败通知地址
     */
    public $fail_notify_url;










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
            'spbill_create_ip' => $model->spbill_create_ip,
            'bank_type' => $model->bank_type,
            'consignee_info' => $model->consignee_info,
            'userId' => $model->userId,
            'device_info' => $model->device_info,
            'terminal_info' => $model->terminal_info,
            'limit_credit_pay' => $model->limit_credit_pay,
            'allow_repeat_pay' => $model->fail_notify_url,
            'fail_notify_url' => $model->spbill_create_ip,



        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'cupmulappQrcodepayRequest' => [
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
                'spbill_create_ip' => [
                    Validator::MAX_LEN => 16,
                ],
                'bank_type' => [
                    Validator::MAX_LEN => 9,
                ],
                'userId' => [
                    Validator::MAX_LEN => 128,
                ],


            ],

        );

        return $checkRules['cupmulappQrcodepayRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
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
            'spbill_create_ip' => $model->spbill_create_ip,
            'bank_type' => $model->bank_type,
            'consignee_info' => $model->consignee_info,
            'userId' => $model->userId,
            'device_info' => $model->device_info,
            'terminal_info' => $model->terminal_info,
            'limit_credit_pay' => $model->limit_credit_pay,
            'allow_repeat_pay' => $model->fail_notify_url,
            'fail_notify_url' => $model->spbill_create_ip,
        );

        return $bizReqJson;
    }
}
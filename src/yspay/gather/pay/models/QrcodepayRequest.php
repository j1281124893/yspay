<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class QrcodepayRequest
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
     * 二维码行别
     */
    public $bank_type;

    /**
     * 收货人信息json格式
     */
    public $consignee_info;

    /**
     * 跨境支付付款人信息json格式，当收款方商户为跨境商户时，此域所有字段必填。
     */
    public $cross_border_info;


    /**
     * 微信分配的子商户公众号账号ID
     */
    public $appid;

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
     * 花呗分期期数
     */
    public $hb_fq_num;


    /**
     * 交易类型，说明：1或者空：即时到账，2：担保交易
     */
    public $tran_type;

    /**
     * 同步通知地址。
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
            'consignee_info' => $model->consignee_info,
            'cross_border_info' => $model->cross_border_info,
            'appid' => $model->appid,
            'province' => $model->province,
            'city' => $model->city,
            'limit_credit_pay' => $model->limit_credit_pay,
            'hb_fq_num' => $model->hb_fq_num,
            'tran_type' => $model->tran_type,
            'return_url' => $model->return_url,

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
            "bank_type" => $model->bank_type,
            "consignee_info" => $model->consignee_info,
            "cross_border_info" => $model->cross_border_info,
            "appid" => $model->appid,
            "province" => $model->province,
            "city" => $model->city,
            "limit_credit_pay" => $model->limit_credit_pay,
            "hb_fq_num" => $model->hb_fq_num,
            "tran_type" => $model->tran_type,
            "return_url" => $model->return_url,

        );

        return $bizReqJson;
    }
}
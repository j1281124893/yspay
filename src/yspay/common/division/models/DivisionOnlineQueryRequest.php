<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class DivisionOnlineQueryRequest
{

    /**
     * 原交易发起方
     */
    public $src_usercode;
    /**
     * 原订单号
     */
    public $out_trade_no;
    /**
     * 商户批次号,格式：(S|F)+15位唯一流水，建议格式：S+YYYYMMDD+XXXXXXX.F表示代付，S表示代收。
     */
    public $out_batch_no;
    /**
     * 系统标志 DD：订单交易，DS：代收交易，默认是DD，订单交易
     */
    public $sys_flag;



    public static function getParam($model)
    {

        $param = array(
            'src_usercode' => $model->src_usercode,
            'out_trade_no' => $model->out_trade_no,
            'out_batch_no' => $model->out_batch_no,
            'sys_flag' => $model->sys_flag,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'divisionOnlineQueryRequest' => [
                'src_usercode' => [
                    Validator::MAX_LEN => 20,
                ],
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],


            ],

        );

        return $checkRules['divisionOnlineQueryRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "src_usercode" => $model->src_usercode,
            "out_trade_no" => $model->out_trade_no,
            "out_batch_no" => $model->out_batch_no,
            "sys_flag" => $model->sys_flag,
        );

        return $bizReqJson;
    }
}
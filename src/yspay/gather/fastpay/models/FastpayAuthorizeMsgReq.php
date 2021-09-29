<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class FastpayAuthorizeMsgReq
{

    /**
     * 商户生成的订单号
     */
    public $out_trade_no;




    public static function getParam($model)
    {

        $param = array(
            'out_trade_no' => $model->out_trade_no,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'fastpayAuthorizeMsgReq' => [
                'out_trade_no' => [
                    Validator::MAX_LEN => 32,
                ],
            ],

        );

        return $checkRules['fastpayAuthorizeMsgReq'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "out_trade_no" => $model->out_trade_no,

        );

        return $bizReqJson;
    }
}
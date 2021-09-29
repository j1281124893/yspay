<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class WechatAuthenticateRequest
{

    /**
     * 实名认证申请单单号
     */
    public $apply_no;





    public static function getParam($model)
    {

        $param = array(
            'apply_no' => $model->apply_no,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'wechatAuthenticateRequest' => [
                'apply_no' => [
                ],


            ],

        );

        return $checkRules['wechatAuthenticateRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "orderId" => $model->orderId,
        );

        return $bizReqJson;
    }
}
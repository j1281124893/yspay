<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;



class CupgetmulappUseridRequest
{

    /**
     * 授权码
     */
    public $userAuthCode;

    /**
     * 银联支付标识
     */
    public $appUpIdentifier;









    public static function getParam($model)
    {

        $param = array(
            'userAuthCode' => $model->userAuthCode,
            'appUpIdentifier' => $model->appUpIdentifier,


        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'cupgetmulappUseridRequest' => [
                'userAuthCode' => [
                    Validator::MAX_LEN => 64,
                ],
                'appUpIdentifier' => [
                    Validator::MAX_LEN => 64,
                ],


            ],

        );

        return $checkRules['cupgetmulappUseridRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "userAuthCode" => $model->userAuthCode,
            "appUpIdentifier" => $model->appUpIdentifier,

        );

        return $bizReqJson;
    }
}
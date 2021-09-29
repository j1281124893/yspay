<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class AuthenticateApplyQueryRequest
{

    /**
     * 商户号
     */
    public $usercode;





    public static function getParam($model)
    {

        $param = array(
            'usercode' => $model->usercode,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'authenticateApplyQueryRequest' => [
                'usercode' => [
                ],


            ],

        );

        return $checkRules['authenticateApplyQueryRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "usercode" => $model->usercode,
        );

        return $bizReqJson;
    }
}
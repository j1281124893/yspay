<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class BillDownloadurlGetRequest
{

    /**
     * 商户日期
     */
    public $account_date;



    public static function getParam($model)
    {

        $param = array(
            'account_date' => $model->account_date,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'billDownloadurlGetRequest' => [
                'account_date' => [
                    Validator::MAX_LEN => 10,
                ],


            ],

        );

        return $checkRules['billDownloadurlGetRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "account_date" => $model->account_date,
        );

        return $bizReqJson;
    }
}
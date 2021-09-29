<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class WeChatUploadPicRequest
{

    /**
     * 商户号
     */
    public $superUsercode;
    /**
     * 图片类型
     */
    public $picType;
    /**
     * 图片流
     */
    public $picFile;
    /**
     * 联系人证件号
     */
    public $token;

    /**
     * 图片路径
     */
    public $filePath;

    /**
     * 文件名加后缀
     */
    public $filename;




    public static function getParam($model)
    {

        $param = array(
            'superUsercode' => $model->superUsercode,
            'picType' => $model->picType,
            'picFile' => $model->picFile,
            'token' => $model->token,
            'filePath' => $model->filePath,
            'filename' => $model->filename,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'weChatUploadPicRequest' => [
                'superUsercode' => [
                    Validator::MAX_LEN => 20,
                ],
                'picType' => [
                    Validator::MAX_LEN => 2,
                ],
                'token' => [
                    Validator::MAX_LEN => 50,
                ],

            ],

        );

        return $checkRules['weChatUploadPicRequest'];
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
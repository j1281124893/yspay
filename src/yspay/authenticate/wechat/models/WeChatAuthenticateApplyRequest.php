<?php

namespace Yspay\SDK\Model;


use Yspay\SDK\Gathering\Kernel\Validator;

include_once dirname(dirname(dirname(dirname(__FILE__)))) . '\util\Validator.php';


class WeChatAuthenticateApplyRequest
{

    /**
     * 商户号
     */
    public $usercode;
    /**
     * 商户名称必须与商家营业执照上的名称一致
     */
    public $cust_name;
    /**
     * 联系人证件类型支持类型请参照第7小节
     */
    public $contact_cert_type;
    /**
     * 联系人证件号
     */
    public $contact_cert_no;
    /**
     * 企业法人身份证证件有效开始日期,格式为yyyyMMdd。
     */
    public $legal_cert_initial;
    /**
     * 企业法人身份证证件有效期结束日期,格式为yyyyMMdd
     */
    public $legal_cert_expire;
    /**
     * 营业执照有效开始日期，格式为yyyyMMdd
     */
    public $bus_license_initial;
    /**
     * 营业执照有效结束日期，格式为yyyyMMdd
     */
    public $bus_license_expire;
    /**
     * 小微经营类型,(00):门店场所,(01):流动经营/便民服务,(02):线上商品/服务交易
     */
    public $store_type;
    /**
     * (00):门店场所：填写门店名称。(01):流动经营/便民服务：填写经营/服务名称。(02):线上商品/服务交易：填写线上店铺名称
     */
    public $store_name;
    /**
     * 图片token值
     */
    public $token;





    public static function getParam($model)
    {

        $param = array(
            'usercode' => $model->usercode,
            'cust_name' => $model->cust_name,
            'contact_cert_type' => $model->contact_cert_type,
            'contact_cert_no' => $model->contact_cert_no,
            'legal_cert_initial' => $model->legal_cert_initial,
            'legal_cert_expire' => $model->legal_cert_expire,
            'bus_license_initial' => $model->bus_license_initial,
            'bus_license_expire' => $model->bus_license_expire,
            'store_type' => $model->store_type,
            'store_name' => $model->store_name,
            'token' => $model->token,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'weChatAuthenticateApplyRequest' => [
                'usercode' => [
                    Validator::MAX_LEN => 50,
                ],
                'cust_name' => [
                    Validator::MAX_LEN => 100,
                ],
                'contact_cert_type' => [
                    Validator::MAX_LEN => 2,
                ],
                'contact_cert_no' => [
                    Validator::MAX_LEN => 80,
                ],
                'legal_cert_initial' => [
                    Validator::MAX_LEN => 8,
                ],
                'legal_cert_expire' => [
                    Validator::MAX_LEN => 8,
                ],


            ],

        );

        return $checkRules['weChatAuthenticateApplyRequest'];
    }

    public static function build($kernel, $model)
    {

        $bizReqJson = array(
            "usercode" => $model->usercode,
            "cust_name" => $model->cust_name,
            "contact_cert_type" => $model->contact_cert_type,
            "legal_cert_initial" => $model->legal_cert_initial,
            "legal_cert_expire" => $model->legal_cert_expire,
            "bus_license_initial" => $model->bus_license_initial,
            "bus_license_expire" => $model->bus_license_expire,
            "store_type" => $model->store_type,
            "store_name" => $model->store_name,
            "token" => $model->token,
            "contact_cert_no" => WeChatAuthenticateApplyRequest::encryptDes($model->contact_cert_no, $kernel->partner_id),

        );

        return $bizReqJson;
    }


    /**
     * des加密函数
     */
    public static function encryptDes($input, $key)
    {
        if (!isset($input) || !isset($key)) {
            return "";
        }
        $key = substr($key, 0, 8);
        if (iconv_strlen($key,"UTF-8") < 8) {
            $key = sprintf("%+8s", $key);
        }

        $data = openssl_encrypt($input, 'DES-ECB', $key, OPENSSL_RAW_DATA, "");
        $data = base64_encode($data);
        return $data;
    }



}
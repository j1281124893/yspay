<?php
namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\AuthenticateApplyQueryRequest;
use Yspay\SDK\Model\WeChatAuthenticateApplyRequest;
use Yspay\SDK\Model\WechatAuthenticateRequest;
use Yspay\SDK\Model\WeChatUploadPicRequest;


include_once dirname(dirname(dirname(__FILE__))) . '\Common.php';


class WeChatAuthenticate
{


    public $common;
    protected $kernel;

    public function __construct($kernel)
    {
        $this->common = new Common($kernel);
        $this->kernel = $kernel;
    }

    /**
     * lfk
     * @Desc 微信实名认证开户意愿申请
     * @DATA 2021年7月12日下午2:02:09
     */
    public function WeChatAuthenticateApply($model)
    {
        try {
            $check = $this->common->checkFields(WeChatAuthenticateApplyRequest::getCheckRules()
                , WeChatAuthenticateApplyRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.authenticate.wx.apply', $this->kernel, $model);
            $bizReqJson = WeChatAuthenticateApplyRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_authenticate_wx_apply_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();
            return $responses;
        }
    }

    /**
     * lfk
     * @Desc 图片上传口令获取
     * @DATA 2021年7月12日下午2:02:09
     */
    public function registerTokenGet()
    {
        try {
            $headParams = $this->common->commonHeads('ysepay.merchant.register.token.get', $this->kernel, $model);

            $headParams['biz_content'] = "{}";//构造字符串
            ksort($headParams);
            $signStr = $this->common->signSort($headParams);
            $sign = $this->common->sign_encrypt(array('data' => $signStr));
            $headParams['sign'] = trim($sign['check']);
            $url = 'https://register.ysepay.com:2443/register_gateway/gateway.do';
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_merchant_register_token_get_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();
            return $responses;
        }
    }

    /**
     * lfk
     * @Desc 图片上传
     * @DATA 2021年7月12日下午2:02:09
     */
    public function weChatUploadPic($model)
    {
        try {
            $check = $this->common->checkFields(WeChatUploadPicRequest::getCheckRules()
                , WeChatUploadPicRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }

            $headParams = array();
            $headParams['superUsercode'] = $model->superUsercode;
            $headParams['picType'] = $model->picType;
            $headParams['token'] = $model->token;

            $filePath = $this->common->str_to_utf8($model->filePath);
            $filename = $this->common->str_to_utf8($model->filename);

            var_dump($filePath);
            var_dump($filename);
            $curl_file = curl_file_create(iconv('utf-8', 'gbk', $filePath), 'image/jpeg', $filename);
            $headParams['picFile'] = $curl_file;
            $url = 'https://uploadApi.ysepay.com:2443/yspay-upload-service?method=upload';
            $responses = new Response();
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $headParams);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            var_dump($response);
            if (curl_errno($ch)) {
                $curl_errno = curl_errno($ch);
                var_dump($curl_errno);
            }
            $response = json_decode($response, true);

            return Response::setMap($response);
            //  return $this->common->post_Url($url, $headParams, "ysepay_online_fastpay_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 查询微信实名认证申请单状态
     * @DATA 2021年7月12日下午2:02:09
     */
    public function authenticateQuery($model)
    {
        try {
            $check = $this->common->checkFields(WechatAuthenticateRequest::getCheckRules()
                , WechatAuthenticateRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.authenticate.wx.query', $this->kernel, $model);

            $bizReqJson = array(
                "apply_no" => $model->apply_no,
            );
            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_authenticate_wx_query_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 微信实名认证-撤销申请单
     * @DATA 2021年7月12日下午2:02:09
     */
    public function authenticateApplyCancel($model)
    {
        try {
            $check = $this->common->checkFields(WechatAuthenticateRequest::getCheckRules()
                , WechatAuthenticateRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.authenticate.wx.apply.cancel', $this->kernel, $model);

            $bizReqJson = array(
                "apply_no" => $model->apply_no,
            );
            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_authenticate_wx_apply_cancel_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();
            return $responses;
        }
    }

    /**
     * lfk
     * @Desc 查询微信实名认证授权状态
     * @DATA 2021年7月12日下午2:02:09
     */
    public function authenticateApplyQuery($model)
    {
        try {
            $check = $this->common->checkFields(AuthenticateApplyQueryRequest::getCheckRules()
                , AuthenticateApplyQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.authenticate.wx.authorized.query', $this->kernel, $model);

            $bizReqJson = AuthenticateApplyQueryRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_authenticate_wx_authorized_query_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();
            return $responses;
        }
    }

}
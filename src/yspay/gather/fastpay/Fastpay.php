<?php

namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\FastpayAuthorizeMsgReq;
use Yspay\SDK\Model\FastpayAuthorizeRequest;
use Yspay\SDK\Model\FastpayRequest;
use Yspay\SDK\Model\TrusteeshipfastPayRequest;
use Yspay\SDK\Model\TrusteeshipSignConfirmRequest;
use Yspay\SDK\Model\TrusteeshipSignRequest;




class Fastpay
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
     * @Desc 快捷消费申请
     * @DATA 2021年7月02日下午2:02:09
     */
    public function fastpay($model)
    {
        try {
            $check = $this->common->checkFields(FastpayRequest::getCheckRules()
                , FastpayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.fastpay', $this->kernel, $model);
            $bizReqJson = FastpayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_online_fastpay_response", false);

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
     * @Desc 快捷消费授权
     * @DATA 2021年7月02日下午2:02:09
     */
    public function fastpayAuthorize($model)
    {
        try {
            $check = $this->common->checkFields(FastpayAuthorizeRequest::getCheckRules()
                , FastpayAuthorizeRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.fastpay.authorize', $this->kernel, $model);
            $bizReqJson = FastpayAuthorizeRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_online_fastpay_authorize_response", false);
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
     * @Desc 快捷重新获取授权码
     * @DATA 2021年7月02日下午2:02:09
     */
    public function fastpayAuthorizeMsg($model)
    {
        try {
            $check = $this->common->checkFields(FastpayAuthorizeMsgReq::getCheckRules()
                , FastpayAuthorizeMsgReq::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.fastpay.authorize.msg', $this->kernel, $model);
            $bizReqJson = FastpayAuthorizeMsgReq::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->url;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_online_fastpay_authorize_msg_response", false);
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
     * @Desc 发起签约申请
     * @DATA 2021年7月02日下午2:02:09
     */
    public function trusteeshipSign($model)
    {
        try {
            $check = $this->common->checkFields(TrusteeshipSignRequest::getCheckRules()
                , TrusteeshipSignRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.trusteeship.sign', $this->kernel, $model);
            $bizReqJson = TrusteeshipSignRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->trusteeshipUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_trusteeship_sign_response", false);
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
     * @Desc 签约确认接口
     * @DATA 2021年7月02日下午2:02:09
     */
    public function trusteeshipSignConfirm($model)
    {
        try {
            $check = $this->common->checkFields(TrusteeshipSignConfirmRequest::getCheckRules()
                , TrusteeshipSignConfirmRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.trusteeship.sign.confirm', $this->kernel, $model);
            $bizReqJson = TrusteeshipSignConfirmRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->trusteeshipUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_trusteeship_sign_confirm_response", false);
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
     * @Desc 快捷协议支付
     * @DATA 2021年7月02日下午2:02:09
     */
    public function trusteeshipfastPay($model)
    {
        try {
            $check = $this->common->checkFields(TrusteeshipfastPayRequest::getCheckRules()
                , TrusteeshipfastPayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.trusteeship.fastPay', $this->kernel, $model);
            $bizReqJson = TrusteeshipfastPayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->trusteeshipUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_trusteeship_fastPay_response", false);
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
<?php

namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\AlijsapiRequest;
use Yspay\SDK\Model\BarcodepayRequest;
use Yspay\SDK\Model\CupgetmulappUseridRequest;
use Yspay\SDK\Model\CupmulappQrcodepayRequest;
use Yspay\SDK\Model\MobileControlsPayRequest;
use Yspay\SDK\Model\QrcodepayRequest;
use Yspay\SDK\Model\TradeDeliveredRequest;
use Yspay\SDK\Model\WeixinPayRequest;


class Pay
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
     * @Desc 担保交易发货通知
     * @DATA 2021年7月01日下午2:02:09
     */
    public function tradeDelivered($model)
    {
        try {
            $check = $this->common->checkFields(TradeDeliveredRequest::getCheckRules()
                , TradeDeliveredRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.trade.delivered', $this->kernel, $model);
            $bizReqJson = TradeDeliveredRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            return $this->common->post_Url($url, $headParams, "ysepay_online_trade_delivered_response", false);
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
     * @Desc 担保交易确认收货
     * @DATA 2021年7月01日下午2:02:09
     */
    public function tradeConfirm($model)
    {
        try {
            $check = $this->common->checkFields(TradeDeliveredRequest::getCheckRules()
                , TradeDeliveredRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.trade.confirm', $this->kernel, $model);
            $bizReqJson = TradeDeliveredRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            return $this->common->post_Url($url, $headParams, "ysepay_online_trade_confirm_response", false);
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
     * @Desc 反扫码支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function barcodepay($model)
    {
        try {
            $check = $this->common->checkFields(BarcodepayRequest::getCheckRules()
                , BarcodepayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.barcodepay', $this->kernel, $model);
            $bizReqJson = BarcodepayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->qrcodeUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_online_barcodepay_response", false);
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
     * @Desc 支付宝生活号支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function alijsapi($model)
    {
        try {
            $check = $this->common->checkFields(AlijsapiRequest::getCheckRules()
                , AlijsapiRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.alijsapi.pay', $this->kernel, $model);
            $bizReqJson = AlijsapiRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->qrcodeUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_online_alijsapi_pay_response", true);
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
     * @Desc 微信公众号、小程序支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function weixinPay($model)
    {
        try {
            $check = $this->common->checkFields(WeixinPayRequest::getCheckRules()
                , WeixinPayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.weixin.pay', $this->kernel, $model);
            $bizReqJson = WeixinPayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->qrcodeUrl;
            //var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_online_weixin_pay_response", true);
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
     * @Desc 行业码获取用户标识
     * @DATA 2021年7月01日下午2:02:09
     */
    public function cupgetmulappUserid($model)
    {
        try {
            $check = $this->common->checkFields(CupgetmulappUseridRequest::getCheckRules()
                , CupgetmulappUseridRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.cupgetmulapp.userid', $this->kernel, $model);
            $bizReqJson = CupgetmulappUseridRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->qrcodeUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_online_cupgetmulapp_userid_response", true);
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
     * @Desc 行业码支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function cupmulappQrcodepay($model)
    {
        try {
            $check = $this->common->checkFields(CupmulappQrcodepayRequest::getCheckRules()
                , CupmulappQrcodepayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.cupmulapp.qrcodepay', $this->kernel, $model);
            $bizReqJson = CupmulappQrcodepayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->qrcodeUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_online_cupmulapp_qrcodepay_response", true);
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
     * @Desc 正扫支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function qrcodepay($model)
    {
        try {
            $check = $this->common->checkFields(QrcodepayRequest::getCheckRules()
                , QrcodepayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.qrcodepay', $this->kernel, $model);
            $bizReqJson = QrcodepayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->qrcodeUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_online_qrcodepay_response", true);
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
     * @Desc 手机控件支付
     * @DATA 2021年7月01日下午2:02:09
     */
    public function mobileControlsPay($model)
    {
        try {
            $check = $this->common->checkFields(MobileControlsPayRequest::getCheckRules()
                , MobileControlsPayRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.online.mobile.controls.pay', $this->kernel, $model);
            $bizReqJson = MobileControlsPayRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->url;
            return $this->common->post_Url($url, $headParams, "ysepay_online_mobile_controls_pay_response", true);
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
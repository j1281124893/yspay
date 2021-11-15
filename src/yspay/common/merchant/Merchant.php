<?php

namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\MerchantBalanceQueryRequest;
use Yspay\SDK\Model\MerchantWithdrawQueryRequest;
use Yspay\SDK\Model\MerchantWithdrawRequest;


include_once dirname(dirname(dirname(__FILE__))) . '\Common.php';


class Merchant
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
     * @Desc 一般消费户提现
     * @DATA 2021年7月01日下午2:02:09
     */
    public function merchantWithdraw($model)
    {
        try {
            $check = $this->common->checkFields(MerchantWithdrawRequest::getCheckRules()
                , MerchantWithdrawRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.merchant.withdraw.quick.accept', $this->kernel, $model);
            $bizReqJson = MerchantWithdrawRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->commonUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_merchant_withdraw_quick_accept_response", false);
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
     * @Desc 待结算账户提现 （D0提现）
     * @DATA 2021年7月01日下午2:02:09
     */
    public function merchantWithdrawD0($model)
    {
        try {
            $check = $this->common->checkFields(MerchantWithdrawRequest::getCheckRules()
                , MerchantWithdrawRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }

            $headParams = $this->common->commonHeads('ysepay.merchant.withdraw.d0.accept', $this->kernel, $model);
            $bizReqJson = MerchantWithdrawRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->commonUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_merchant_withdraw_d0_accept_response", false);
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
     * @Desc 商户提现查询
     * @DATA 2021年7月01日下午2:02:09
     */
    public function merchantWithdrawQuery($model)
    {
        try {
            $check = $this->common->checkFields(MerchantWithdrawQueryRequest::getCheckRules()
                , MerchantWithdrawQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }

            $headParams = $this->common->commonHeads('ysepay.merchant.withdraw.quick.query', $this->kernel, $model);

            $bizReqJson = MerchantWithdrawQueryRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->commonUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_merchant_withdraw_quick_query_response", false);
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
     * @Desc 商户余额查询
     * @DATA 2021年7月08日下午2:02:09
     */
    public function merchantBalanceQuery($model)
    {
        try {
            $check = $this->common->checkFields(MerchantBalanceQueryRequest::getCheckRules()
                , MerchantBalanceQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }

            $headParams = $this->common->commonHeads('ysepay.merchant.balance.query', $this->kernel, $model);
            $bizReqJson = MerchantBalanceQueryRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson);
            $url = $this->kernel->commonUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_merchant_balance_query_response", false);
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
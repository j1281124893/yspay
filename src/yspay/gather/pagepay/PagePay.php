<?php

namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\DirectpayCreatebyuserRequest;
use Yspay\SDK\Model\WapDirectpayCreatebyuserReq;




class PagePay
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
     * @Desc WAP页面支付
     * @DATA 2021年7月02日下午2:02:09
     */
    public function wapDirectpayCreatebyuser($model)
    {
        try {
            $check = $this->common->checkFields(WapDirectpayCreatebyuserReq::getCheckRules()
                , WapDirectpayCreatebyuserReq::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $myParams = array();
            $myParams['method'] = 'ysepay.online.wap.directpay.createbyuser';
            $myParams['partner_id'] = $this->kernel->partner_id;
            $myParams['timestamp'] = date('Y-m-d H:i:s');;
            $myParams['charset'] = $this->kernel->charset;
            $myParams['sign_type'] = $this->kernel->sign_type;
            $myParams['notify_url'] = $this->kernel->notify_url;
            $myParams['version'] = $this->kernel->version;
            $myParams['tran_type'] = $model->tran_type;
            $myParams['return_url'] = $model->return_url;

            $myParams["out_trade_no"] = $model->out_trade_no;
            $myParams["shopdate"] = $model->shopdate;
            $myParams["subject"] = $model->subject;
            $myParams["total_amount"] = $model->total_amount;
            $myParams["seller_id"] = $model->seller_id;
            $myParams["seller_name"] = $model->seller_name;
            $myParams["timeout_express"] = $model->timeout_express;
            $myParams["extend_params"] = $model->extend_params;
            $myParams["extra_common_param"] = $model->extra_common_param;
            $myParams["business_code"] = $model->business_code;
            $myParams["pay_mode"] = $model->pay_mode;
            $myParams["bank_type"] = $model->bank_type;
            $myParams["bank_account_type"] = $model->bank_account_type;
            $myParams["support_card_type"] = $model->support_card_type;
            $myParams["bank_account_no"] = $model->bank_account_no;
            $myParams["fast_pay_name"] = $model->fast_pay_name;
            $myParams["fast_pay_id_no"] = $model->fast_pay_id_no;
            $myParams["fast_pay_validity"] = $model->fast_pay_validity;
            $myParams["fast_pay_mobile"] = $model->fast_pay_mobile;
            $myParams["fast_pay_cvv2"] = $model->fast_pay_cvv2;

            ksort($myParams);
            $signStr = $this->common->signSort($myParams);
            $sign = $this->common->sign_encrypt(array('data' => $signStr));
            $myParams['sign'] = trim($sign['check']);
            $responses = new Response();
            $myParams = $this->common->unsetArry($myParams);
            var_dump($myParams);
            $action = $url = $this->kernel->url;
            var_dump('提交地址：' . $action);
            $def_url = PHP_EOL. "<form style='text-align:center;' method=post action='" . $action . "' target='_blank'>";
            foreach ($myParams as $key => $val) {
                $def_url .= PHP_EOL. "<input type = 'hidden'  name='" . $key . "' value='" . $val . "' />";
            }
            $def_url .= "<input type=\"submit\" value=\"pay...\" style=\"display:none\" >";
            $def_url .= "</form>";
            $def_url .= "<script>document.forms[0].submit();</script>";
            return Response::setMap($def_url);

        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();;
            return $responses;
        }
    }

    /**
     * lfk
     * @Desc WEB页面支付
     * @DATA 2021年7月02日下午2:02:09
     */
    public function directpayCreatebyuser($model)
    {
        try {
            $check = $this->common->checkFields(DirectpayCreatebyuserRequest::getCheckRules()
                , DirectpayCreatebyuserRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $myParams = array();
            $myParams['method'] = 'ysepay.online.directpay.createbyuser';
            $myParams['partner_id'] = $this->kernel->partner_id;
            $myParams['timestamp'] = date('Y-m-d H:i:s');;
            $myParams['charset'] = $this->kernel->charset;
            $myParams['sign_type'] = $this->kernel->sign_type;
            $myParams['notify_url'] = $this->kernel->notify_url;
            $myParams['version'] = $this->kernel->version;
            $myParams['tran_type'] = $model->tran_type;
            $myParams['return_url'] = $model->return_url;

            $myParams['out_trade_no'] = $model->out_trade_no;
            $myParams['shopdate'] = $model->shopdate;
            $myParams['subject'] = $model->subject;
            $myParams['total_amount'] = $model->total_amount;
            $myParams['currency'] = $model->currency;
            $myParams['seller_id'] = $model->seller_id;
            $myParams['seller_name'] = $model->seller_name;
            $myParams['timeout_express'] = $model->timeout_express;
            $myParams['extend_params'] = $model->extend_params;
            $myParams['extra_common_param'] = $model->extra_common_param;
            $myParams['business_code'] = $model->business_code;
            $myParams['pay_mode'] = $model->pay_mode;
            $myParams['bank_type'] = $model->bank_type;
            $myParams['bank_account_type'] = $model->bank_account_type;
            $myParams['support_card_type'] = $model->support_card_type;
            $myParams['consignee_info'] = $model->consignee_info;
            $myParams['cross_border_info'] = $model->cross_border_info;


            $myParams = $this->common->unsetArry($myParams);
            ksort($myParams);
            $signStr = $this->common->signSort($myParams);
            $sign = $this->common->sign_encrypt(array('data' => $signStr));
            $myParams['sign'] = trim($sign['check']);

            $action = $action = $url = $this->kernel->url;
            $def_url = "<form style='text-align:center;' method=post action='" . $action . "' target='_blank'>";
            foreach ($myParams as $key => $val) {
                $def_url .= PHP_EOL. "<input type = 'hidden'  name='" . $key . "' value='" . $val . "' />";
            }
            $def_url .= "<input type=\"submit\" value=\"pay...\" style=\"display:none\" >";
            $def_url .= "</form>";
            $def_url .= "<script>document.forms[0].submit();</script>";
            return Response::setMap($def_url);
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();;
            return $responses;
        }
    }

}
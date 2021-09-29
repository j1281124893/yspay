<?php
namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\DfBillDownloadurlGetRequest;
use Yspay\SDK\Model\DfSingleQuickAcceptRequest;
use Yspay\SDK\Model\DfSingleQuickInnerAcceptReq;
use Yspay\SDK\Model\DSingleQuickQueryRequest;
use Yspay\SDK\Model\WapDirectpayCreatebyuserReq;





class Replcepay
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
     * @Desc 单笔代付交易（银行卡）
     * @DATA 2021年7月08日下午2:02:09
     */
    public function dfSingleQuickAccept($model)
    {
        try {
            $check = $this->common->checkFields(DfSingleQuickAcceptRequest::getCheckRules()
                , DfSingleQuickAcceptRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.df.single.quick.accept', $this->kernel, $model);
            $bizReqJson = DfSingleQuickAcceptRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->dfUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_df_single_quick_accept_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();;
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 单笔代付交易（平台内）
     * @DATA 2021年7月08日下午2:02:09
     */
    public function dfSingleQuickInnerAccept($model)
    {
        try {
            $check = $this->common->checkFields(DfSingleQuickInnerAcceptReq::getCheckRules()
                , DfSingleQuickInnerAcceptReq::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.df.single.quick.inner.accept', $this->kernel, $model);
            $bizReqJson = DfSingleQuickInnerAcceptReq::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->dfUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_df_single_quick_inner_accept_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();;
            return $responses;
        }
    }



    /**
     * lfk
     * @Desc 单笔代付查询
     * @DATA 2021年7月08日下午2:02:09
     */
    public function dfSingleQuickQuery($model)
    {
        try {
            $check = $this->common->checkFields(DSingleQuickQueryRequest::getCheckRules()
                , DSingleQuickQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.df.single.query', $this->kernel, $model);
            $bizReqJson = DSingleQuickQueryRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->dfOderUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_df_single_query_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();;
            return $responses;
        }
    }



    /**
     * lfk
     * @Desc 单笔代付对账单
     * @DATA 2021年7月08日下午2:02:09
     */
    public function dfBillDownloadurlGet($model)
    {
        try {
            $check = $this->common->checkFields(DfBillDownloadurlGetRequest::getCheckRules()
                , DfBillDownloadurlGetRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $headParams = $this->common->commonHeads('ysepay.df.bill.downloadurl.get', $this->kernel, $model);
            $bizReqJson = array(
                "account_date" => $model->account_date,
            );
            $bizReqJson = DfBillDownloadurlGetRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->dfOderUrl;
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, "ysepay_df_bill_downloadurl_get_response", false);
        } catch (YSNetworkException $e) {
            $responses = new Response();
            $responses->errno_code = $e->getCode();
            $responses->responseMeg = $e->getMessage();
            return $responses;
        } catch (Exception $e) {
            $responses = new Response();
            //  $responses->responseCode = $this->common->param['errorCode'];
            $responses->responseMeg = $e->getMessage();;
            return $responses;
        }
    }


}
<?php

namespace Yspay\SDK;


use Exception;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Gathering\Payment\Common\Models\Response;
use Yspay\SDK\Model\DivisionOnlineAcceptRequest;
use Yspay\SDK\Model\DivisionOnlineQueryRequest;


include_once dirname(dirname(dirname(__FILE__))) . '\Common.php';


class Division
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
     * @Desc 分账登记
     * @DATA 2021年7月08日下午2:02:09
     */
    public function divisionOnlineAccept($model)
    {
        try {
            $check = $this->common->checkFields(DivisionOnlineAcceptRequest::getCheckRules()
                , DivisionOnlineAcceptRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            
            $headParams = $this->common->commonHeads('ysepay.single.division.online.accept', $this->kernel, $model);
            $bizReqJson = DivisionOnlineAcceptRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->commonUrl;
            return $this->common->post_Url($url, $headParams, 'ysepay_single_division_online_accept_response', false);
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
     * @Desc 分账查询
     * @DATA 2021年7月08日下午2:02:09
     */
    public function divisionOnlineQuery($model)
    {
        try {
            $check = $this->common->checkFields(DivisionOnlineQueryRequest::getCheckRules()
                , DivisionOnlineQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            
            $headParams = $this->common->commonHeads('ysepay.single.division.online.query', $this->kernel, $model);
            $bizReqJson = DivisionOnlineQueryRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams,$bizReqJson);
            $url = $this->kernel->commonUrl;
            return $this->common->post_Url($url, $headParams, "ysepay_single_division_online_query_response", false);
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
<?php
include_once "../../vendor/autoload.php";

use Yspay\Gathering\SDK\Factory;
use Yspay\SDK\Exception\YSNetworkException;
use Yspay\SDK\Gathering\Base;
use Yspay\SDK\Gathering\Kernel\Common;
use Yspay\SDK\Kernel\Gathering\Util\ResponseChecker;
use Yspay\SDK\Model\FastpayAuthorizeMsgReq;
use Yspay\SDK\Model\FastpayAuthorizeRequest;
use Yspay\SDK\Model\FastpayRequest;
use Yspay\SDK\Model\TrusteeshipfastPayRequest;
use Yspay\SDK\Model\TrusteeshipSignConfirmRequest;
use Yspay\SDK\Model\TrusteeshipSignRequest;
use Yspay\SDK\Util\CommonUtil;


class FastpayTest extends Base
{
    function __construct()
    {
        parent::__construct();

        Base::instance();

    }


    /**
     * lfk
     * @Desc 快捷消费申请
     * @DATA 2021年7月02日下午2:02:09
     */
    public function testFastpay()
    {

        try {
            $request = new FastpayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 CommonUtil::generateOrderNumber();
            $request->shopdate = CommonUtil::getShopDate(); //商户日期"20210713";
            $request->subject = "测试";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->seller_id = "X2107061649551231243";
            $request->seller_name = "刘志林";
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extend_params = "";
            $request->extra_common_param = "";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->buyer_name = "刘志林";
            $request->buyer_card_number = "6217710310182456";
            $request->buyer_mobile = "18680352162";
            $request->bank_type = Common::ALIPAY; //二维码行别，微信-1902000 支付宝-1903000   中国银联-9001002 "3021000";
            $request->bank_account_type = "personal";
            $request->support_card_type = "debit";
            $request->bank_name = "中信银行";
            $request->cardCvn2 = "";
            $request->cardExprDt = "";
            $request->pyerIDTp = "01";
            $request->pyerIDNo = "360781199608035113";
            $request->consignee_info = "";
            $request->cross_border_info = "";
            $request->province = "000659";
            $request->city = "000660";
            $request->limit_credit_pay = "2010647118";
            $request->mccs = "5811";
            $request->mer_no = "";

            $response = Factory::fastpayClient()->fastpayClass()->fastpay($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }

        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     * lfk
     * @Desc 快捷消费授权
     * @DATA 2021年7月02日下午2:02:09
     */
    public function testfastpayAuthorize()
    {

        try {
            $request = new FastpayAuthorizeRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202107131231";
            $request->buyer_mobile = "18680352162";
            $request->mobile_verify_code = "089812";
            $request->cardCvn2 = "123";
            $request->cardExprDt = "1234";


            $response = Factory::fastpayClient()->fastpayClass()->fastpayAuthorize($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     * lfk
     * @Desc 快捷重新获取授权码
     * @DATA 2021年7月02日下午2:02:09
     */
    public function testFastpayAuthorizeMsg()
    {

        try {
            $request = new FastpayAuthorizeMsgReq();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "202107131231";


            $response = Factory::fastpayClient()->fastpayClass()->fastpayAuthorizeMsg($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     * lfk
     * @Desc 发起签约申请
     * @DATA 2021年7月07日下午2:02:09
     */
    public function testTrusteeshipSign()
    {

        try {
            $request = new TrusteeshipSignRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "20180525684319228064711813";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->buyer_name = "";
            $request->buyer_card_number = "";
            $request->buyer_mobile = "";
            $request->cardCvn2 = "";
            $request->cardExprDt = "";
            $request->pyerIDNo = "";
            $request->imei = "";
            $request->actionScope = "01";
            $request->user_id = "2021072";
            $request->total_amount = "0.02";

            $response = Factory::fastpayClient()->fastpayClass()->trusteeshipSign($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }



    /**
     * lfk
     * @Desc 签约确认接口
     * @DATA 2021年7月07日下午2:02:09
     */
    public function testTrusteeshipSignConfirm()
    {

        try {
            $request = new TrusteeshipSignConfirmRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "20180525683";
            $request->mobile_verify_code = "101098";
            $request->cardCvn2 = "123";
            $request->cardExprDt = "1019";


            $response = Factory::fastpayClient()->fastpayClass()->trusteeshipSignConfirm($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     * lfk
     * @Desc 快捷协议支付
     * @DATA 2021年7月07日下午2:02:09
     */
    public function testTrusteeshipfastPay()
    {

        try {
            $request = new TrusteeshipfastPayRequest();
            $request->out_trade_no = CommonUtil::generateOrderNumber(); //商户生成的订单号 "201805257114";
            $request->shopdate = CommonUtil::getShopDate(); //商户日期"20210712";
            $request->subject = "测试快捷协议";
            $request->total_amount = "0.01";
            $request->currency = "CNY";
            $request->seller_id = Base::SELLER_ID; //收款方银盛支付用户号
            $request->seller_name = Base::SELLER_NAME; //收款方银盛支付客户名
            $request->timeout_express = Base::TIMEOUT_EXPRESS; //设置未付款交易的超时时间 "30m";
            $request->extra_common_param = "";
            $request->business_code = Base::BUSINESS_CODE; //业务代码
            $request->protocol_no = "";
            $request->cardCvn2 = "123";
            $request->cardExprDt = "1019";
            $request->consignee_info = "";
            $request->user_id = "";
            $request->province = "";
            $request->city = "";
            $request->mccs = "5811";
            $request->mer_no = "";


            $response = Factory::fastpayClient()->fastpayClass()->trusteeshipfastPay($request);
            var_dump($response, true);
            $responseChecker = new ResponseChecker();
            // 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败,原因：" . $response->response['msg'];
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }

}